@extends('layout.site')
@section('js')
<script src="{{url('site')}}/js/shop_custom.js"></script>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{url('site')}}/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="{{url('site')}}/styles/shop_responsive.css">
<link rel="stylesheet" type="text/css" href="{{url('site')}}/custom/pagination.css">
@endsection
@section('main')
<!-- Home -->
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{url('site')}}/images/shop_background.jpg"></div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">
            @if(isset($cates->name))
            {{$cates->name}}
            @elseif(isset($manus->name))
            {{$manus->name}}
            @else
            SMART SHOP
            @endif
        </h2>
    </div>
</div>
<!-- Shop -->
<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">Categories</div>
                        <ul class="sidebar_categories">

                            @foreach($categories as $value)

                            <li><a href="{{route('view' , ['slug'=>$value->slug])}}">{{$value['name']}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                    {{-- <div class="sidebar_section filter_by_section">
                        <div class="sidebar_title">Filter By</div>
                        <div class="sidebar_subtitle">Price</div>
                        <div class="filter_price">
                            <div id="slider-range" class="slider_range"></div>
                            <p>Range: </p>
                            <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                        </div>
                    </div> --}}
                    {{-- <div class="sidebar_section">
                        <div class="sidebar_subtitle color_subtitle">Color</div>
                        <ul class="colors_list">
                            <li class="color"><a href="#" style="background: #b19c83;"></a></li>
                            <li class="color"><a href="#" style="background: #000000;"></a></li>
                            <li class="color"><a href="#" style="background: #999999;"></a></li>
                            <li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
                            <li class="color"><a href="#" style="background: #df3b3b;"></a></li>
                            <li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a>
                            </li>
                        </ul>
                    </div> --}}
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle brands_subtitle">Brands</div>
                        <ul class="brands_list">
                            @foreach ($manufacture as $value)
                            <li class="brand"><a href="{{route('view_1', ['slug'=>$value->slug])}}">{{$value->name}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-lg-9">

                <!-- Shop Content -->

                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span>{{$products->total()}}</span> products found</div>
                        <div class="shop_sorting">
                            <span>Sort by:</span>
                            <ul>
                                <li>
                                    <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                                    <ul>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated
                                        </li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name
                                        </li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "price" }'>price</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product_grid">
                        <div class="product_grid_border"></div>
                        @foreach($products as $index => $value)
                        @if($value['sale_amount'] > 0)
                        <?php $markup = ($value['sale_amount'] / $value['price'])*100 ; 
                                        $discount = $value['price'] - $value['sale_amount'];
                                ?>
                        <!-- Slider Item -->
                        <div class="border_active"></div>
                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="product_image d-flex flex-column align-items-center justify-content-center">

                                @if($value->productImage->first())
                                <img src="{{asset('images/' . $value->productImage->first()->url)}}" alt="">
                                @else
                                <img src="{{asset('images/no-image.png')}}" alt="{{$value['name']}}">

                                @endif

                            </div>
                            <div class="product_content">
                                <div class="product_price discount">
                                    {{number_format($discount)}}<span>{{number_format($value['price'])}}</span>
                                </div>
                                <div class="product_name">
                                    <div><a href="{{route('product', ['id' => $value['id']])}}">{{$value['name']}}</a></div>
                                </div>
                                @if(Auth::check())
                                <div class="product_extras">
                                    <div class="product_color">
                                        @if ($value->colors)
                                        @foreach($value->colors as $item_color)
                                        <input type="radio" name="product_color" style="background:{{$item_color->hex}}">
                                        @endforeach
                                        @endif
                                    </div>

                                    <button class="product_cart_button">Add to Cart</button>


                                </div> @endif
                            </div>
                            <a class="product_fav @if($value->getFavorited()) active @endif" href="{{ route('wishlist.add_del', [$value]) }}">
                                <i class="fas fa-heart"></i>
                            </a>
                            <ul class="product_marks">
                                <li class="product_mark product_discount">{{ number_format($markup,1)}}%</li>
                                <li class="product_mark product_new">new</li>
                            </ul>
                        </div>
                        @else
                        <!-- Product Item -->
                        <div class="product_item is_new">
                            <div class="product_border"></div>
                            <div class="product_image d-flex flex-column align-items-center justify-content-center">

                                <a href="{{route('product', ['id' => $value['id']])}}">
                                    @if ($value->productImage->first())
                                    <img src="{{ asset('images/' . $value->productImage->first()->url)}}" alt="{{$value->name}}">
                                    @else
                                    <img src="{{ asset('images/')}}" alt="{{$value->name}}">
                                    @endif
                                </a>
                            </div>
                            <div class="product_content">
                                <div class="product_price">{{number_format($value['price'])}} VND</div>
                                <div class="product_name">
                                    <div><a href="{{route('product', ['id' => $value['id']])}}" tabindex="0">{{$value['name']}}</a></div>
                                </div>
                            </div>
                            <a class="product_fav @if($value->getFavorited()) active @endif" href="{{ route('wishlist.add_del', [$value]) }}">
                                <i class="fas fa-heart"></i>
                            </a>
                            <ul class="product_marks">
                                @if($index <= 10) <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                    @endif
                            </ul>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    {{-- giu lai tham so khi tim kiem phan trang --}}
                    {{-- <div class="shop_page_nav d-flex flex-row"> --}}
                    {{$products->appends(request()->all())->links('layout.custom.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
