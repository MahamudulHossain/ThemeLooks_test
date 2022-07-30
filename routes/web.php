<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;


Route::get('/',[ProductController::class,'view_products']);

//Register
Route::group(['prefix'=>'register'],function (){
    Route::get('/form',[RegisterController::class,'view_register_form']);
    Route::post('/submit',[RegisterController::class,'register_form_save']);
    Route::get('/users_list',[RegisterController::class,'registerd_users_list']);
    Route::get('/user/delete/{id}',[RegisterController::class,'registerd_user_delete']);
    Route::get('/edit_form/{id}',[RegisterController::class,'view_register_edit_form']);
    Route::post('/update/{eid}',[RegisterController::class,'register_form_update']);

});

Route::group(['prefix'=>'product'],function(){
    Route::get('/form',[ProductController::class,'view_product_form']);
    Route::post('/submit',[ProductController::class,'product_form_save']);
    Route::get('/details/{id}',[ProductController::class,'product_detail']);
    Route::get('/sizeBasedProductDetails',[ProductController::class,'size_based_product_detail']);
    Route::get('/list',[ProductController::class,'products_list']);
});
