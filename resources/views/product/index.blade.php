@extends('product/layout.app')
@section('main')
<div class="container">
    <div style="text-align: right;">
        <a href="product/create" class="btn btn-dark mt-2">New Product</a>
    </div>
    <table class="table table-hover mt-2">
        <thead class="table-dark">
          <tr>
            <th scope="col">S.no</th>
            <th scope="col">Name</th>
            <th scope="col">image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                {{-- <th scope="row">1</th> --}}
                <td>{{$loop->index+1}}</td>
                <td>{{$product->name}}</td>
                <td>
                    <img src="products/{{$product->image}}" class="rounded-circle" width="50" height="50">
                </td>
                <td>
                    <a href="products/{{$product->id}}/edit" class="btn btn-dark ">Edit</a>
                    {{-- <a href="" class="btn btn-danger btn-sm ">Delete</a> --}}
                    <form action="products/{{$product->id}}/delete" class="d-inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                    </form>
                </td>
            </tr>
            @endforeach
            
        </table>
            
</div>

@endsection