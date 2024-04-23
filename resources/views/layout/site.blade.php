<?php 
$routes = config('page_route');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Smart Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Smart shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('site/styles/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('site/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('site/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('site/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('site/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('site/plugins/slick-1.8.0/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('site/styles/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('site/styles/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('site/custom/site_cutom.css')}}">


    @yield('css')

</head>

<body>

    <div class="super_container">
        <!-- Header -->
        <header class="header">

            <!-- Top Bar -->

            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">

                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{url('site')}}/images/phone.png" alt=""></div>+38
                                068 005 3570
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{url('site')}}/images/mail.png" alt=""></div><a
                                    href="mailto:fastsales@gmail.com">fastsales@gmail.com</a>
                            </div>
                            {{-- MESSAGE DO NOT ADMIN --}}
                            @if(Session::has('message'))
                            <div id="not_access_admin">
                                {{ Session::get('message') }}
                            </div>
                            @endif
                            @if(Session::has('order_1'))
                            <div id="not_access_admin">
                                {{ Session::get('order_1') }}
                            </div>
                            @endif
                            @if(session()->has('login_success'))
                            <div id="not_access_admin">
                                {{ session('login_success') }}
                            </div>
                            @endif
                            @if(session()->has('contact_1'))
                            <div id="not_access_admin">
                                {{ session('contact_1') }}
                            </div>
                            @endif

                            <div class="top_bar_content ml-auto">

                                <div class="top_bar_menu">

                                    <ul class="standard_dropdown top_bar_dropdown">

                                    </ul>
                                </div>
                                <div class="top_bar_user">
                                    @if(Auth::check())
                                    @if(Auth::user()->avatar)
                                    <div class="user_icon"><img src="{{asset('images/'. Auth::user()->avatar->url)}}"
                                            alt=""> </div>
                                    @endif

                                    @else
                                    <div class="user_icon"><img src="{{url('site')}}/images/user.svg" alt="">
                                    </div>
                                    @endif
                                    @if (Route::has('login'))
                                    @auth
                                    <a href="{{ url('/profile') }}"
                                        class="text-sm text-gray-700 dark:text-gray-500 underline">{{ Auth::user()->name
                                        }}</a>
                                    @else
                                    <a href="{{ route('login') }}"
                                        class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                    @endif

                                    @endauth
                                    @endif
                                    @if(Auth::check())
                                    <div class="">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                {{__('Logout')}}
                                            </x-dropdown-link>
                                        </form>
                                    </div>
                                    @endif

                                    {{-- <div><a href="">Sign up</a></div> --}}
                                    {{-- <div><a href="">Sign in</a></div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Main -->

            <div class="header_main">
                <div class="container">
                    <div class="row">

                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="{{route('home')}}">SmartS</a></div>
                            </div>
                        </div>

                        <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form action="{{route('shop')}}" class="header_search_form clearfix">
                                            <input type="search" name="key" required="required" style="width= 100%"
                                                class="header_search_input" placeholder="Search for products...">
                                            <div class="custom_dropdown" style="display: none">
                                                <div class="custom_dropdown_list">
                                                    <span class="custom_dropdown_placeholder clc">All Categories</span>
                                                    <i class="fas fa-chevron-down"></i>
                                                    <ul class="custom_list clc">
                                                        <li><a class="clc" href="#">All Categories</a></li>
                                                        <li><a class="clc" href="#">Computers</a></li>
                                                        <li><a class="clc" href="#">Laptops</a></li>
                                                        <li><a class="clc" href="#">Cameras</a></li>
                                                        <li><a class="clc" href="#">Hardware</a></li>
                                                        <li><a class="clc" href="#">Smartphones</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="submit" class="header_search_button trans_300"
                                                value="Submit"><img src="{{url('site')}}/images/search.png"
                                                    alt=""></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                    <div class="wishlist_icon"><img src="{{url('site')}}/images/heart.png" alt=""></div>
                                    <div class="wishlist_content">
                                        <div class="wishlist_text"><a href="{{route('wishlist')}}">Wishlist</a></div>
                                        @if (Auth::check())

                                        <div class="wishlist_count">{{Auth::user()->wishlist()->count()}}</div>
                                        @else

                                        <div class="wishlist_count">0</div>
                                        @endif
                                    </div>
                                </div>
                                <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        @if(Auth::check())
                                        <div class="cart_icon">
                                            <img src="{{url('site')}}/images/cart.png" alt="">
                                            <div class="cart_count"><span>{{Auth::user()->cart()->count()}}</span></div>
                                        </div>
                                        <?php
                                                $productAllCart =  Auth::user()->cart()->with('product')->get();
                                                $total = 0;
                                                foreach ($productAllCart as  $value) {
                                                $total += $value['price'] *$value['qty'];
                                                };
                                             ?>

                                        <div class="cart_content">
                                            <div class="cart_text"><a href="{{route('cart')}}">Cart</a></div>
                                            <div class="cart_price">{{number_format($total)}}</div>
                                        </div>


                                        @else
                                        <div class="cart_icon">
                                            <img src="{{url('site')}}/images/cart.png" alt="">
                                            <div class="cart_count"><span>0</span></div>
                                        </div>

                                        <div class="cart_content">
                                            <div class="cart_text"><a href="{{route('login')}}">Cart</a></div>
                                            <div class="cart_price">0</div>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->

            <nav class="main_nav">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div class="main_nav_content d-flex flex-row">
                                <!-- Categories Menu -->
                                <div class="cat_menu_container">
                                    <div
                                        class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                        <div class="cat_burger"><span></span><span></span><span></span></div>
                                        <div class="cat_menu_text">categories</div>
                                    </div>
                                    <ul class="cat_menu">
                                        @foreach($categories as $value)
                                        <li><a href="{{route('view' , ['slug'=>$value->slug])}}">{{$value['name']}}<i
                                                    class="fas fa-chevron-right ml-auto"></i></a></li>
                                        @endforeach
                                    </ul>
                                    {{-- <ul class="cat_menu">
                                        <li><a href="#">Computers & Laptops <i
                                                    class="fas fa-chevron-right ml-auto"></i></a></li>
                                        <li><a href="#">Cameras & Photos<i class="fas fa-chevron-right"></i></a></li>
                                        <li class="hassubs">
                                            <a href="#">Hardware<i class="fas fa-chevron-right"></i></a>
                                            <ul>
                                                <li class="hassubs">
                                                    <a href="#">Menu Item<i class="fas fa-chevron-right"></i></a>
                                                    <ul>
                                                        <li><a href="#">Menu Item<i
                                                                    class="fas fa-chevron-right"></i></a></li>
                                                        <li><a href="#">Menu Item<i
                                                                    class="fas fa-chevron-right"></i></a></li>
                                                        <li><a href="#">Menu Item<i
                                                                    class="fas fa-chevron-right"></i></a></li>
                                                        <li><a href="#">Menu Item<i
                                                                    class="fas fa-chevron-right"></i></a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Smartphones & Tablets<i class="fas fa-chevron-right"></i></a>
                                        </li>
                                        <li><a href="#">TV & Audio<i class="fas fa-chevron-right"></i></a></li>
                                        <li><a href="#">Gadgets<i class="fas fa-chevron-right"></i></a></li>
                                        <li><a href="#">Car Electronics<i class="fas fa-chevron-right"></i></a></li>
                                        <li><a href="#">Video Games & Consoles<i class="fas fa-chevron-right"></i></a>
                                        </li>
                                        <li><a href="#">Accessories<i class="fas fa-chevron-right"></i></a></li>
                                    </ul> --}}
                                </div>

                                <!-- Main Nav Menu -->

                                <div class="main_nav_menu ml-auto">
                                    <ul class="standard_dropdown main_nav_dropdown">
                                        <li><a href="{{route('home')}}">Home<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="{{route('shop')}}">Shop<i class="fas fa-chevron-down"></i></a></li>
                                        <li class="hassubs">
                                            <a href="#">Pages<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                @foreach($routes as $value)
                                                <li>
                                                    <a href="{{ route($value['route']) }}">
                                                        {{ $value['name']}}<i class="fas fa-chevron-down"></i></a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{route('blog')}}">Blog<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="{{route('contact')}}">Contact<i
                                                    class="fas fa-chevron-down"></i></a></li>
                                    </ul>
                                </div>

                                <!-- Menu Trigger -->

                                <div class="menu_trigger_container ml-auto">
                                    <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                        <div class="menu_burger">
                                            <div class="menu_trigger_text">menu</div>
                                            <div class="cat_burger menu_burger_inner">
                                                <span></span><span></span><span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Menu -->

            <div class="page_menu">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div class="page_menu_content">

                                <div class="page_menu_search">
                                    <form action="#">
                                        <input type="search" required="required" class="page_menu_search_input"
                                            placeholder="Search for products...">
                                    </form>
                                </div>
                                {{-- <ul class="page_menu_nav">
                                    <li class="page_menu_item has-children">
                                        <a href="#">Language<i class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item has-children">
                                        <a href="#">Currency<i class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item">
                                        <a href="#">Home<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    <li class="page_menu_item has-children">
                                        <a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
                                            <li class="page_menu_item has-children">
                                                <a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                                <ul class="page_menu_selection">
                                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item has-children">
                                        <a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item has-children">
                                        <a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item"><a href="blog.html">blog<i
                                                class="fa fa-angle-down"></i></a></li>
                                    <li class="page_menu_item"><a href="contact.html">contact<i
                                                class="fa fa-angle-down"></i></a></li>
                                </ul> --}}

                                <div class="menu_contact">
                                    <div class="menu_contact_item">
                                        <div class="menu_contact_icon"><img src="{{url('site')}}/images/phone_white.png"
                                                alt=""></div>
                                        +38 068 005 3570
                                    </div>
                                    <div class="menu_contact_item">
                                        <div class="menu_contact_icon"><img src="{{url('site')}}/images/mail_white.png"
                                                alt=""></div><a
                                            href="mailto:fastsales@gmail.com">fastsales@gmail.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        @yield('main')
        <!-- Footer -->
        @extends('layout.footersite')