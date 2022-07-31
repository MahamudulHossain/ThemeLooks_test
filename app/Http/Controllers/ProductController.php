<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function view_products(){
        $load_products = Product::all();
        return view('index',compact('load_products'));
    }

    public function view_product_form(){
        return view('product.product_form');
    }

    public function product_form_save(Request $req){
        $req->validate([
            "name"=>'required|unique:products,name',
            "image"=>'required|mimes:jpg,jpeg,png',

        ]);
        DB::transaction(function() use($req){
    		$product = new Product();
            $product->name = $req->name;
            if($req->hasfile('image')){
                $file = $req->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time(). '.' .$ext;
                $file->move('uploads/images',$filename);
                $product->image= $filename;
            }
            $product->save();

            //Product Attribute Entry
            $count = count($req->price);
            for ($i=0; $i < $count; $i++) {
                $pr_attr = new ProductAttribute();
                $pr_attr->product_id = $product->id;
                $pr_attr->price = $req->price[$i];
                $pr_attr->color = $req->color[$i];
                $pr_attr->size = $req->size[$i];
                $pr_attr->gender = $req->gender[$i];
                $pr_attr->save();
            }
    	});
        return redirect('/product/list')->with('msg','Product Added Successfully');
    }

    public function product_detail($id){
        $productInfo = Product::with('product_attributes')->where('id',$id)->get();
        return view('product.product_details',compact('productInfo'));
    }

    public function size_based_product_detail(Request $req){
        $pro_id = $req->productId;
        $pro_size = $req->productSize;
        $product_attrs = ProductAttribute::where(['product_id'=>$pro_id,'size'=>$pro_size])->get();
        return response()->json(['data'=>$product_attrs]);
    }

    public function products_list(){
        $products = Product::with('product_attributes')->orderBy('id','desc')->get();
        return view('product.products_list',compact('products'));
    }

    public function product_delete($did){
        $delPro = Product::find($did);
        if($delPro){
            $delAttr = ProductAttribute::where('product_id',$did)->delete();
            $image_path = public_path().'/uploads/images/'.$delPro->image;
            unlink($image_path);
            $delPro->delete();
            return redirect('/product/list')->with('msg','Product Deleted Successfully');
        }else{
            return redirect('/product/list')->with('msg','Sorry! Something went wrong');
        }
    }

    public function product_edit_form($eid){
        $editData = Product::with('product_attributes')->where('id',$eid)->get();
        return view('product.product_edit_form',compact('editData'));
    }

    public function product_update(Request $req,$uid){
        $req->validate([
            "name"=>"required|unique:products,name,$uid",
            "image"=>'mimes:jpg,jpeg,png',

        ]);
        $filename="";
        //Deleting Product
        $delPro = Product::find($uid);
        if($req->hasfile('image')){
            $image_path = public_path().'/uploads/images/'.$delPro->image;
            unlink($image_path);
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' .$ext;
            $file->move('uploads/images',$filename);
        }else{
            $filename = $delPro->image;
        }
        $delAttr = ProductAttribute::where('product_id',$uid)->delete();
        $delPro->delete();

            // Adding Product
            $product = new Product();
            $product->name = $req->name;
            $product->image= $filename;
            $product->save();

            //Product Attribute Entry
            $count = count($req->price);
            for ($i=0; $i < $count; $i++) {
                $pr_attr = new ProductAttribute();
                $pr_attr->product_id = $product->id;
                $pr_attr->price = $req->price[$i];
                $pr_attr->color = $req->color[$i];
                $pr_attr->size = $req->size[$i];
                $pr_attr->gender = $req->gender[$i];
                $pr_attr->save();
            }

        return redirect('/product/list')->with('msg','Product Updated Successfully');
    }

}
