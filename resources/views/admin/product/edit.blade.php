@extends('layout.admin')
@section('title')
<h1 class="text-primary p-2 h3">EDIT CATEGORY</h1>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('admin/custom/create_category.css')}}">
@endsection
@section('content')
<div class="container">

    <form action="{{route('product.update',[$product->id])}}" method="post">
        @if (session('update_cate_success'))
        <div class="alert alert-success" role="alert">
            {{ session('update_cate_success') }}
        </div>
        @endif
        @if (session('update_cate_fail'))
        <div class="alert alert-danger" role="alert">
            {{ session('update_cate_fail') }}
        </div>
        @endif
       
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
            @error('name')
            <div class="form-text">{{$message}}</div>
            @enderror
        </div>
      

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
@endsection
