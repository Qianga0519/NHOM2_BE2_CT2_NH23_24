<!DOCTYPE html>
<html lang="en">

<head>
    <title>SmartS</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
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
    @yield('css')
</head>

<body>
    <div class="super_container">
        <!-- Header -->
        <header class="header">
            <!-- Header Main -->
            <div class="header_main">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="{{route('home.index')}}">SmartS</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
       
        <div class="main">
            <div class="conatiner content">
                <div class="col logo-sign-up" style="">
                    <div class="logo_container logon-below">
                        <div class="logo"><a href="{{route('home.index')}}">SmartS</a></div>
                    </div>
                </div>
                <div class="col">
                   @yield('main')
                </div>
            </div>
        </div>
        <!-- Footer -->
        @extends('layout.footersite')