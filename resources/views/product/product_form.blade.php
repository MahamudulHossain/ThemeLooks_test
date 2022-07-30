@extends('layout')

@section('title','Theme Looks Test')

@section('content')

<h2 style="text-align: center">Add Product</h2>
@if ($errors->any())
    <div class="alert alert-danger" style="margin-top: 15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ url('product/submit') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-9">
        <div class="card" style="padding:10px;margin-bottom:10px;">
            <div class="card-body">
                <label for="">Product Name<span>*</span></label>
                <input type="text" class="form-control" placeholder="Product name" name="name" required style="margin-bottom: 15px;">
                <label for="">Product Image<span>*</span></label>
                <input type="file" class="form-control" name="image" required style="margin-bottom: 15px;">
            </div>
        </div>
        <h4 style="color: green;font-weight:bold">Add Attributes</h4>
        <table id="attr_tbl">
            <tr>
                <td>
                    <div class="card" style="padding:10px;margin-bottom:10px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="number" class="form-control" placeholder="Price" name="price[]" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Size" name="size[]">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Color" name="color[]">
                                </div>
                            </div>
                            <div class="row" style="margin-top:30px;">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Gender" name="gender[]">
                                </div>
                                <div class="col-md-4">
                                    <input type="button" class="btn btn-success" value="Add More" onclick="add_attr()">
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <button class="btn btn-success" style="margin-bottom: 45px;">Save Product</button>
    </div>
</form>
<script type="text/javascript">
    function add_attr(){
        var add = '<tr><td><div class="card"  style="padding:10px;margin-bottom:10px;"><div class="card-body"><div class="row"><div class="col-md-4"><input type="number" class="form-control" placeholder="Price" name="price[]" required></div><div class="col-md-4"><input type="text" class="form-control" placeholder="Size" name="size[]"></div><div class="col-md-4"><input type="text" class="form-control" placeholder="Color" name="color[]"></div></div><div class="row" style="margin-top:30px;"><div class="col-md-4"><input type="text" class="form-control" placeholder="Gender" name="gender[]"></div><div class="col-md-4"><input type="button" class="btn btn-danger" value="Delete" onclick="delete_tr(this)"></div></div></div></div></td></tr>';
        jQuery('#attr_tbl').append(add);
    }

    function delete_tr(that){
        $(that).closest('tr').remove();
    }
</script>
@endsection
