@extends('layout.site')
@section('js')
<script src="{{url('site')}}/js/cart_custom"></script>

<script src="{{url('site')}}/js/product_custom.js"></script>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{url('site')}}/styles/cart_responsive.css">
<link rel="stylesheet" type="text/css" href="{{url('site')}}/styles/cart_styles.css">
<style>

</style>
{{-- table --}}
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('site/custom/table')}}/css/style.css">
@endsection

@section('js')

@endsection
@section('main')

<!-- Cart -->

<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">Wishlist</div>
                    <div class="cart_items">
                        <ul class="cart_list">

                            <div class="table-wrap">
                                <table class="table">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            <th>Product</th>                                       
                                            <th>Price</th>                                     
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wishlist_user as $value)
                                        <tr class="alert" role="alert">
                                            <td>
                                                <label class="checkbox-wrap checkbox-primary">
                                                    <input type="checkbox" checked>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td>
                                            <a href="{{route('product', $value->product->id)}}">    <div class="img" style="background-image: url({{asset('images/'.$value->product->productImage->first()->url)}});"></div>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="name">
                                                    <span>{{$value->product->name}}</span>
                                                    <span></span>
                                                </div>
                                            </td>                                          
                                            <td>{{number_format($value->product->price,0)}}</td>                                                                            
                                            <td>
                                                <a onclick="" href="{{route('wishlist.add_del', $value->product)}}" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </ul>
                    </div>

                    <!-- Order Total -->
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <?php 
                            $totalPrice=0;
                            foreach ($wishlist_user as $item) {                     
                            $itemPrice = $item->qty * $item->price;
                            $totalPrice += $itemPrice;                        
                           };
							?>
                            <div class="order_total_title">Order Total:</div>
                            <div class="order_total_amount">{{number_format($totalPrice)}}</div> 
                        </div>
                    </div>

                    <div class="cart_buttons">
                        <a href="{{route('wishlist.clear')}}" class="button cart_button_clear">CLEAR</a>
                        {{-- <button type="button" class="button cart_button_checkout">CHECKOUT</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->

@endsection
