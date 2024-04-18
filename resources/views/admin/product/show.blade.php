@extends('layout.admin')
@section('title')
<h1 class="text-primary p-2 h3">PRODUCT</h1>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
<style>
    label {
        color: #007bff
    }

    span {
        font-weight: normal;
        color: black;
    }

    .image_show_pro {
        width: 80%;
        height: auto;
    }

    .card-body {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .card-body a,
    .input_infor button {
        margin: 0 10px;
        width: 75px;

    }

    .form-text {
        color: red;
    }

    .btn-delete {
        position: absolute;
        top: 0;
        right: -15px;

    }

    .input_infor {
        position: absolute;
        top: 0;
        left: 0;
    }

</style>
@endsection
@section('js')
<script>
    $('.btn-delete').click(function(event) {
        event.preventDefault();
        var _href = $(this).attr('href');
        $('form#form-delete').attr('action', _href)
        if (confirm('Are you sure?')) {
            $('form#form-delete').submit();
        }
    })

</script>
@endsection
@section('messages')
@if (session('del_product_image_1'))
<div class="alert alert-primary" role="alert">
    {{ session('del_product_image_1') }}
</div>
@endif

@if (session('add_product_image_1'))
<div class="alert alert-primary" role="alert">
    {{ session('add_product_image_1') }}
</div>
@endif

@if (session('add_product_image_0'))
<div class="alert alert-primary" role="alert">
    {{ session('add_product_image_0') }}
</div>
@endif

@if (session('edit_product_image_0'))
<div class="alert alert-primary" role="alert">
    {{ session('edit_product_image_0') }}
</div>
@endif
@if (session('edit_product_image_1'))
<div class="alert alert-primary" role="alert">
    {{ session('edit_product_image_1') }}
</div>
@endif
@if (session('edit_product_null'))
<div class="alert alert-primary" role="alert">
    {{ session('edit_product_null') }}
</div>
@endif
@endsection
@section('content')
<div class="container">


    <div class="mb-3">
        <label for="name" class="form-label">Name: <span>{{$product->name}}</span> </label>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Description: <span>{{$product->description}}</span> </label>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Price: <span>{{number_format($product->price)}}</span> <span>VND</span> </label>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Quanttity: <span>{{$product->qty}}</span> </label>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Sale amount: <span>{{number_format($product->sale_amount)}}</span> <span>VND</span> </label>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Category: <span>{{$product->category->name}}</span> </label>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Manufacture: <span>{{$product->manufacture->name}}</span> </label>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Image</label>
        <div class="mb-3">
            <form action="{{route('product-image.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                <input style="display: none" name="product_id" value="{{$product['id']}}">
                @error('image')
                <div class="form-text">{{$message}}</div>
                @enderror
                <input type="file" name="image">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button>

            </form>
        </div>
        <div class="row">
            @foreach ($product->productImage as $value )
            <div class="col-md-6 col-sm col-lg-4 ">
                <div class="card" style="width: 18rem;">
                    <form action="{{route('product-image.update', $value['id'])}}" enctype="multipart/form-data" method="post">
                        <img class="image_show_pro" src="{{asset('images/'.$value->url )}}" alt="">
                        <label for="name" class="form-label">Name: <input style="" name="pro_image_name" value="{{$value->name}}"></label>
                        <div class="card-body">
                            @csrf @method('PUT')
                            <div class="input_infor">
                                <input style="display: none" name="product_id" value="{{$product['id']}}">
                                <input type="file" name="image" style="width: 41%">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                            </div>
                    </form>
                    <a href="{{route('product-image.destroy', $value['id'])}}" class="btn btn-danger btn-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<form action="" method="POST" id=form-delete>
    @csrf @method('DELETE')
</form>
@endsection
