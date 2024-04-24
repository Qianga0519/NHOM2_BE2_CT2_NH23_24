@extends('layout.admin')
@section('title')
<h1 class="text-primary p-2 h3">EDIT MANUFACTURE</h1>
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

    <form action="{{route('manufacture.update', $manu->id)}}" method="post" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-10">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$manu->name}}">
                    @error('name')
                    <div class="form-text">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{$manu->slug}}">
                    @error('slug')
                    <div class="form-text">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <textarea name="country" class="form-control" id="country" cols="30" rows="5">{{$manu->country}}</textarea>
                    @error('country')
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

           
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
@endsection
