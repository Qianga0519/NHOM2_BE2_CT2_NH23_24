<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $products;
    public function __construct()
    {
        $this->products = Product::get();
    }
    public function index()
    {
        // dd($this->products->first()->productImage->first()->url);
        return view('clients.home', ['products' => $this->products]);
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
        return view('clients.blog_single');
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
    public function test()
    {
        $product = Product::find(1)->productImage->first();
        dd($product->url);
        return view('clients.test');
    }
}
