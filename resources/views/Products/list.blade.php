@extends('products.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Products List</h4>
        <form action="{{ route('search') }}">
        @csrf
            <div class="form-group">
              <label for="">Search</label>
              <input type="text"
                class="form-control" name="search" id="search" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Type min 3 words</small>
            </div>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Submit</button>
        </form>
        <a href="{{ route('importView') }}" class="btn btn-sm btn-info float-right" style="margin-left:3px">
        <span class="fa fa-download"> Import</span></a>
        <a href="{{ route('export') }}" class="btn btn-sm btn-warning float-right" style="margin-left:3px">
        <span class="fa fa-upload"> Export</span></a>
        <a href="{{ route('products.create') }}" class="btn btn-sm btn-success float-right">
        <span class="fa fa-plus-circle"> Add New Product</span></a>
    </div>
    <div class="card-body">

        @if($message = Session::get('success'))
        <div class="alert alert-success">
        <p align="center">{{$message}}</p>
        </div>
        @endif

        @if($message = Session::get('error'))
        <div class="alert alert-danger">
        <p align="center">{{$message}}</p>
        </div>
        @endif

        <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Category ID</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>        
        <tbody>
            <tr>
            @php($no=1)
            @foreach($data as $product)                         
                <td>{{ $no++ }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category_id }}</td>
                <td><img src="{{ URL::to('/') }}/images/{{ $product->file }}" width="60" /></td>
                <td width="25%">
                <!-- here is the button action side where you can edit . view and delete the employee record -->
                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-eye"></span> Detail</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span> Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span> Delete</button>
                    </form>
                                <!-- ends here -->
                </td>            
            </tr>
            @endforeach
        </tbody>        
        </table>
        {!! $data->links() !!}
    </div>
</div>
@endsection