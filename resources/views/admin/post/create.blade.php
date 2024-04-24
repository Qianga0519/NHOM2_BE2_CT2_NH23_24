@extends('layout.admin')
@section('title')
<h1 class="text-primary p-2 h3">CREATE POST</h1>
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

    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf 
        <div class="row">
            <div class="col-10">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title"  name="title" value="{{old('title')}}">
                    @error('title')
                    <div class="form-text">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" style="width: 100%" id="content"  cols="30" rows="10">{{old('content')}}</textarea>
                    @error('content')
                    <div class="form-text">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image"  name="image">
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
