@extends('products.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Product</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('products.update',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" placeholder="Enter Product Name">
            </div>
            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $data->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Product Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $data->price }}" placeholder="Enter Product Price">
            </div>
            <div class="form-group">
                <label for="category_id">Product Category</label>
                <input type="number" class="form-control" id="category_id" name="category_id" value="{{ $data->category_id }}" placeholder="Enter Product Category">
            </div>
            <div class="form-group">
                <label for="file">Product Image</label><br>
                <img src="{{ URL::to('/') }}/images/{{ $data->file }}" width='100' />
                <input type="hidden" name="file" value="{{ $data->file }}" />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection