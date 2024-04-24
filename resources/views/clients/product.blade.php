@extends('layout.site')
@section('js')
<script src="{{url('site')}}/js/product_custom.js"></script>
<script>



</script>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{url('site')}}/styles/product_responsive.css">
<link rel="stylesheet" type="text/css" href="{{url('site')}}/styles/product_styles.css">
<link rel="stylesheet" href="{{asset('site/custom/product_custom.css')}}">
<style>


</style>
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
                    @if($index >= 0 && $index <=2) <li data-image="{{asset('images/' . $value->url)}}"><img src="{{asset('images/' . $value->url)}}" alt=""></li>
                        @endif
                        @endforeach
                </ul>
            </div>
            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected">
                    <a href="{{route('product', ['id' => $product['id']])}}">
                        @if ($product->productImage->first())
                        <img src="{{asset('images/' . $product->productImage->first()->url)}}" alt="{{$product->name}}"></div>
                @else
                <img src="{{asset('images/' )}}" alt="{{$product->name}}">
            </div>
            @endif
            </a>



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
                    <form action="{{route('cart.add',[$product])}}">
                        <div class="clearfix" style="z-index: 1000;">
                            <!-- Product Quantity -->
                            <div class="product_quantity clearfix">
                                <span>Quantity: </span>
                                <input id="quantity_input" name="qty" type="text" pattern="[0-9]*" value="1">
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
                                        <div id="selected_color" style="border: 0.2px solid;" class="color_mark"></div>
                                    </div>
                                    <ul class="color_list">

                                        @if ($product->colors)
                                        @foreach ( $product->colors as $value )
                                        <li>
                                            <input class="color_mark" type="radio" value="{{$value->id}}" name="product_color" style="background:{{$value->hex}}; ">
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="product_price">{{number_format($product['price'] - $product['sale_amount']) }}
                        </div>
                        <p class="price_no_sale">{{number_format($product['price'])}}</p>
                        <div class="button_container">

                            @if(Auth::check())

                            <button type="submit" class="button cart_button">Add to Cart</button>

                            <div class="product_fav"><i class="fas fa-heart"></i></div>

                            @else
                            <button type="button" class="button cart_button"><a href="{{route('login')}}">Login to add products to cart</a></button>
                            @endif
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
    <div class="reviewSection">
        <div class="review">
            <h3>Reviews</h3>
        </div>
        @if($product->reviews()->where('user_id', Auth::id())->exists())
        {{-- have review --}}
        <div class="reviewItem_cmt">
            <form action="{{route('review.update', $product['id'])}}">
                <div class="top">
                    @if( Auth::check())
                    <div class="clientImage">
                        <img src="{{asset('images/'. Auth::user()->avatar->url )}}" alt="">
                        <span>{{Auth::user()->name}}</span>
                    </div>
                    @else
                    <div class="clientImage">
                        <img src="{{asset('images/user.png')}}" alt="">
                    </div>
                    @endif
                </div>
                <div class="bot">
                    <div class="side_rate_top">
                        <label for="rating">Review <span> @if(session('choose_star'))
                                {{ session('choose_star') }}
                                @endif</span></label>
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" @if($product->reviews()->where('user_id', Auth::id())->first()->rate == 5) checked @endif
                            />
                            <label for="star5" title="text"> 5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" @if($product->reviews()->where('user_id', Auth::id())->first()->rate == 4) checked @endif
                            />
                            <label for="star4" title="text">4 stars</label>

                            <input type="radio" id="star3" name="rate" value="3" @if($product->reviews()->where('user_id', Auth::id())->first()->rate == 3) checked @endif/>
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" @if($product->reviews()->where('user_id', Auth::id())->first()->rate ==2) checked @endif
                            />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" @if($product->reviews()->where('user_id', Auth::id())->first()->rate == 1) checked @endif
                            />
                            <label for="star1" title="text">1 star</label>
                        </div>
                    </div>
                    <div class="side_rate_bot">
                        <label for="comment">Comment</label><br>
                        <textarea required id="comment" name="content" rows="5" cols="50">{{$product->reviews->where('user_id', Auth::id())->first()->content}}
                        </textarea><br><br>
                        <button type="submit" class="btn_review">Update</button>
                        <button class="delete_btn"><a href="{{route('review.delete', $product['id'])}}" class="btn_review">Delete</a></button>
                    </div>
                </div>
            </form>
        </div>
        @else
        {{--not have review  --}}
        <div class="reviewItem_cmt">
            <form action="{{route('review.create', $product['id'])}}">
                <div class="top">
                    @if( Auth::check())
                    <div class="clientImage">
                        @if(Auth::user()->avatar)
                        <img src="{{asset('images/'. Auth::user()->avatar->url )}}" alt="">
                        @else
                        <img src="{{asset('images/no-image.png')}}" alt="">
                        @endif
                        <span>{{Auth::user()->name}}</span>
                    </div>
                    @else
                    <div class="clientImage">
                        <img src="{{asset('images/user.png')}}" alt="">
                    </div>
                    @endif
                </div>
                <div class="bot">
                    <div class="side_rate_top">
                        <label for="rating">Review <span> @if(session('choose_star'))
                                {{ session('choose_star') }}
                                @endif</span></label>
                        <div class="rate">
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                    </div>
                    <div class="side_rate_bot">
                        <label for="comment">Comment</label><br>
                        <textarea required id="comment" name="content" rows="5" cols="50">{{old('content')}}</textarea><br><br>
                        <button type="submit" class="btn_review">Send</button>
                    </div>
                </div>
            </form>
        </div>
        @endif
        @if(isset($product->reviews->first()->id))
        @foreach ($product->reviews as $value)
        @if(Auth::id() != $value->user->id) 
        <div class="reviewItem">
          
            <div class="top">
                <div class="clientImage">
                    <img src="{{asset('images/'.$value->user->avatar->url)}}" alt="">
                    <span>{{$value->user->name}}</span>
                </div>
                <ul>
                    @for ($i = 0 ; $i < $value->rate ; $i++ )

                        <label class="star" for="star1" title="text">★</label>
                        @endfor
                </ul>
            </div>
            <article>
                <p class="review">{{$value->content}}</p>
                <p>{{$value->created_at->format('d - m - Y')}}</p>
            </article>
        </div>
        @endif
        @endforeach
        @else
        <span>There are no reviews yet </span>
        @endif

    </div>
</div>
</div>
@endsection
