@extends('layout')

@section('title','Theme Looks Test')

@section('content')

<h2 style="text-align: center">Products List</h2>
<table class="table">
    <thead>
        <tr>
            <th width="10%">Product Name</th>
            <th width="20%" style="text-align: center">Image</th>
            <th width="50%" style="text-align: center">Attributes</th>
            <th width="20%" style="text-align: center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td><img src="{{ asset('uploads/images') }}/{{ $product->image }}" width="150px" height="120px"></td>
                <td>
                    <table class="table">
                        <tr>
                            <th>Gender</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Price</th>
                        </tr>
                    @foreach ($product->product_attributes as $proAttr)
                        <tr>
                            <td>{{ $proAttr->gender }}</td>
                            <td>{{ $proAttr->size }}</td>
                            <td>{{ $proAttr->color }}</td>
                            <td>{{ $proAttr->price }} Tk.</td>
                        </tr>
                    @endforeach
                </table>
                </td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
