@extends('layout.site')
@section('js')
<script src="{{url('site')}}/js/cart_custom"></script>
<script src="{{url('site')}}/js/product_custom.js"></script>

@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{url('site')}}/styles/cart_responsive.css">
<link rel="stylesheet" type="text/css" href="{{url('site')}}/styles/cart_styles.css">
{{--table --}}
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('site/custom/table')}}/css/style.css">
<style>


</style>
@endsection


@section('main')

<!-- Cart -->

<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">CHECKOUT</div>
                    <table class="table table-hover">
                        <thead>
                            <tr>

                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart_user as $value)
                            <tr>
                                <td>
                                    {{$value->product->name}}
                                </td>
                                <td>
                                    {{$value->qty}}
                                </td>
                                <td>
                                    {{$value->price * $value->qty}}
                                </td>
                            </tr>
                            @endforeach


                        </tbody>

                    </table>

                    <!-- Order Total -->
                    <form action="{{route('user.order')}}" method="">
                        <table>Note</table>
                        <textarea name="note" required style="width: 100%; padding: 10px"id="" cols="10" rows="5"></textarea>
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <?php 
                            $totalPrice=0;
                            foreach ($cart_user as $item) {                     
                            $itemPrice = $item->qty * $item->price;
                            $totalPrice += $itemPrice;                        
                           };
							?>
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount">{{number_format($totalPrice)}}
                                </div>
                            </div> 
                        </div>


                        <div class="cart_buttons">
                            {{-- <button class="button cart_button_clear" onclick="clearCart()">Clear Cart</button> --}}
                            {{-- <a href="{{route('cart.clear')}}" class="button cart_button_clear">CLEAR</a> --}}
                            <button type="submit" class="button cart_button_checkout">ORDER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->

@endsection
