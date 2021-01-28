@extends('products.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Products Import</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
            @csrf            
            <div class="form-group">
                <label for="file">Select File Excel to Import</label>
                <input type="file" class="form-control-file" id="file" name="file">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection