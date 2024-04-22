@extends('layout.admin')
@section('title')
<h1 class="text-primary p-2 h3">CREATE PRODUCT</h1>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('admin/custom/create_category.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
@endsection
@section('js')
@endsection
@section('messages')

@endsection
@section('content')
<div class="container">

    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-10">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                    @error('name')
                    <div class="form-text">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="5">{{old('description')}}</textarea>
                    @error('description')
                    <div class="form-text">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                    <div class="form-text">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="col-2">
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" name="category_id" style="width: 100%" aria-label="Default select example">
                        <option value="" selected>--SELECT--</option>
                        @foreach ($categories as $value )
                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="form-text">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="manufacture" class="form-label">Manufacture</label>
                    <select class="form-select" name="manufacture_id" style="width: 100%" aria-label="Default select example">
                        <option value="" selected>--SELECT--</option>
                        @foreach ($manufacture as $value )
                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                        @endforeach
                    </select>
                    @error('manufacture_id')
                    <div class="form-text">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="manufacture" class="form-label">Color</label>
                    <select class="form-select" name="color_id" style="width: 100%" aria-label="Default select example">
                        <option value="" selected>--SELECT--</option>
                        @foreach ($colors as $value )
                        <option value="{{$value['id']}}">{{$value['color']}}</option>
                        @endforeach
                    </select>
                    @error('color_id')
                    <div class="form-text">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" max="999999999" value="{{old('price')?old('price'):0}}">
                    @error('price')
                    <div class="form-text">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="sale_amount" class="form-label">Sale amout</label>
                    <input type="number" class="form-control" id="sale_amount" name="sale_amount" max="999999999" value="{{old('sale_amount')?old('sale_amount'):0 }}">
                    @error('sale_amount')
                    <div class="form-text">{{$message}}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="qty" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="qty" name="qty" max="999999999" value="{{old('qty')?old('qty'):1 }}">
                            @error('qty')
                            <div class="form-text">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="feature" class="form-label">Feature</label>
                            <input type="checkbox" class="form-control" id="feature" name="feature">
                            @error('feature')
                            <div class="form-text">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
@endsection
