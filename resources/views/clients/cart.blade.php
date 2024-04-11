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
@endsection

@section('js')
<script>
	document.addEventListener('DOMContentLoaded', function() {
        const decreaseBtn = document.querySelector('.decrease');
        const increaseBtn = document.querySelector('.increase');
        const numberInput = document.querySelector('.number-input');

        decreaseBtn.addEventListener('click', function() {
            let currentValue = parseInt(numberInput.value);
            if (currentValue > parseInt(numberInput.min)) {
                numberInput.value = currentValue - 1;
            }
        });

        increaseBtn.addEventListener('click', function() {
            let currentValue = parseInt(numberInput.value);
            if (currentValue < parseInt(numberInput.max)) {
                numberInput.value = currentValue + 1;
            }
        });
    });

</script>
@endsection
@section('main')

<!-- Cart -->

<div class="cart_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="cart_container">
					<div class="cart_title">Shopping Cart</div>
					<div class="cart_items">
						<ul class="cart_list">

							@foreach ($cart_user as $value)
							<li class="cart_item clearfix">
								<div class="cart_item_image"><img
										src="{{asset('images/'.$value->product->productImage->first()->url)}}" alt="">
								</div>
								<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
									<div class="cart_item_name cart_info_col">
										<div class="cart_item_title">Name</div>
										<div class="cart_item_text">{{$value->product['name']}}</div>
									</div>
									<div class="cart_item_color cart_info_col">
										<div class="cart_item_title">Color</div>
										<div class="cart_item_text"><span
												style="background-color:{{$value->color->hex}}; border: 0.2px solid;"></span>{{$value->color->color}}
										</div>
									</div>
									<div class="cart_item_quantity cart_info_col">
										<div class="cart_item_title">Quantity</div>

										<div class="cart_item_text"> <input type="number" min="0" max="100"
												value="{{$value->qty}}" class="number-input"></div>
									</div>
									<div class="cart_item_price cart_info_col">
										<div class="cart_item_title">Price</div>
										<div class="cart_item_text">{{number_format($value->price,0)}}</div>
									</div>
									<div class="cart_item_total cart_info_col">
										<div class="cart_item_title">Total</div>
										<div class="cart_item_text">{{number_format(($value->price*$value->qty),0)}}
										</div>
									</div>
								</div>
								@endforeach
							</li>
						</ul>
					</div>

					<!-- Order Total -->
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
							<div class="order_total_amount">{{number_format($totalPrice)}}</div>
						</div>
					</div>

					<div class="cart_buttons">
						<button type="button" class="button cart_button_clear">CLEAR</button>
						<button type="button" class="button cart_button_checkout">CHECKOUT</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Newsletter -->

@endsection