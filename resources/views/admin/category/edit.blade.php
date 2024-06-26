@extends('layout.admin')
@section('title')
<h1 class="text-primary p-2 h3">EDIT CATEGORY</h1>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('admin/custom/create_category.css')}}">
@endsection


@section('content')
<div class="container">
    <form action="{{route('category.update',[$category->id])}}" method="post">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
            @error('name')
            <div class="form-text">{{$message}}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug "URL"</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{$category->slug}}">
            @error('slug')
            <div class="form-text">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
@endsection
