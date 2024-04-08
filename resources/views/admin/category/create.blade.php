@extends('layout.admin')
@section('title')
<h1>Categories</h1>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('admin/custom/create_category.css')}}">
@endsection
@section('content')
<div class="container">
    <form action="{{route('category.store')}}" method="post">
        @csrf
        <h1 class="text-primary p-2 h3">ADD CATEGORY</h1>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
            @error('name')
            <div class="form-text">{{$message}}</div>
            @enderror
            {{-- MESSAGE ALL ERROR --}}
            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif --}}
</div>
<div class="mb-3">
    <label for="slug" class="form-label">Slug "URL"</label>
    <input type="text" class="form-control" id="slug" name="slug">
    @error('slug')
    <div class="form-text">{{$message}}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>
@endsection
