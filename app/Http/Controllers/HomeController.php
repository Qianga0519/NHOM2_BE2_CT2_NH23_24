<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('clients.home');
    }
    public function shop()
    {
        return view('clients.shop');
    }
    public function blog()
    {
        return view('clients.blog');
    }

    public function singleBlog()
    {
        return view('clients.singleBlog');
    }
    public function contact()
    {
        return view('clients.contact');
    }
    public function cart()
    {
        return view('clients.cart');
    }
    public function product()
    {
        return view('clients.product');
    }
    public function regular()
    {
        return view('clients.regular');
    }
}
