@extends('layout.admin')
@section('title')
<h1 class="text-primary p-2 h3">ORDER</h1>
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
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <div class="mb-3">
                <label for="name" class="form-label">Name user: <span>{{$order->user->fullname}}</span> </label>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Phone: <span>{{$order->user->phone}}</span> </label>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">City: <span>{{$order->user->city}}</span> </label>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">District: <span>{{$order->user->district}}</span> </label>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Ward: <span>{{$order->user->ward}}</span> </label>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Address: <span>{{$order->user->address}}</span> </label>
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3">
                <label for="name" class="form-label">Order_id: <span>{{$order->id}}</span> </label>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Note: <span>{{$order->note}}</span> </label>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Shipping: <span>{{number_format($order->shipping)}}</span> </label>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Total: <span>{{number_format($order->total)}}</span> </label>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Status: <span>{{$order->status}}</span> </label>
            </div>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Name product</th>
                <th scope="col">Color product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Sale amount</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderItems as $value )
            <tr>
                <td>{{$value->product->name}}</td>
                <td>{{$value->color->color}}</td>
                <td>{{$value->qty}}</td>
                <td>{{number_format($value->sale_amount)}}</td>
                <td>{{number_format($value->price)}}</td>
                <td>{{number_format($value->price * $value->qty)}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>





</div>

@endsection
