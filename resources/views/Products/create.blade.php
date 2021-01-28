@extends('products.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add New Product</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name">
            </div>
            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Product Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Enter Product Price">
            </div>
            <div class="form-group">
                <label for="category_id">Product Category</label>
                <input type="number" class="form-control" id="category_id" name="category_id" placeholder="Enter Product Category">
            </div>
            <div class="form-group">
                <label for="file">Upload Product Image</label>
                <input type="file" class="form-control-file" id="file" name="file" onchange="previewFile(this)">
                <img id="previewImg" alt="Product Image" style="max-width:130px;margin-top:10px;">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script>
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];
        if(file) {
            var reader = new FileReader();
            reader.onload = function() {
                $("#previewImg").attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection