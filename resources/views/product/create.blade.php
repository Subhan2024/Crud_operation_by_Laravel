@extends('product/layout.app')
@section('main')
    

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
            <form action="/product/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    @if($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                    <br>
                    <label for="">Description</label>
                    <textarea name="description"  rows="4" class="form-control">
                        {{old('description')}}</textarea>
                    @if($errors->has('description'))
                    <span class="text-danger">{{$errors->first('description')}}</span>
                    @endif
                    <br>
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                    @if($errors->has('image'))
                    <span class="text-danger">{{$errors->first('image')}}</span>
                    @endif
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
