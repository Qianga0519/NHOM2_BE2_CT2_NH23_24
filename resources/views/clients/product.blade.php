@extends('layout.site')
@section('js')
<script src="{{url('site')}}/js/product_custom.js"></script>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{url('site')}}/styles/product_responsive.css">
<link rel="stylesheet" type="text/css" href="{{url('site')}}/styles/product_styles.css">

@endsection


@section('main')

<!-- Single Product -->

<div class="single_product">
    <div class="container">
        <div class="row">
            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">



                    @foreach($product->productImage as $index => $value)
                    @if($index >= 1 && $index <=4) <li data-image="images/{{ $value->url }}">
                        <img src="{{ asset('images/' . $value->url) }}" alt="">
                        </li>
                        @endif
                        @endforeach

                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected"><img src="{{asset('images/' . $product->productImage->first()->url)}}" alt=""></div>
            </div>

            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">
                    <div class="product_category">{{$product->category->name}}</div>
                    <div class="product_name">{{$product['name']}}</div>
                    <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    <div class="product_text">
                        <p>{{$product['description']}}</p>
                    </div>
                    <div class="order_info d-flex flex-row">
                        <form action="#">
                            <div class="clearfix" style="z-index: 1000;">

                                <!-- Product Quantity -->
                                <div class="product_quantity clearfix">
                                    <span>Quantity: </span>
                                    <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                    </div>

                                </div>

                                <!-- Product Color -->
                                <ul class="product_colors">
                                    <li>
                                        <span>Color: </span>
                                        <div class="color_mark_container">
                                            <div id="selected_color" class="color_mark"></div>
                                        </div>
                                        <div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

                                        <ul class="color_list">

                                            @foreach ( $product->colors as $value )
                                            <li>
                                                <div class="color_mark" style="background: {{$value->hex}};"></div>
                                            </li>
                                            @endforeach


                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="product_price">{{number_format($product['price'] - $product['sale_amount']) }}
                                VND</div>
                            <div class="button_container">
                                <button type="button" class="button cart_button">Add to Cart</button>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>



@endsection
