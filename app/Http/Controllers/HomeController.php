<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $products;
    public function __construct()
    {
        $this->products =  Product::get();
    }
    public function index()
    {
        $products =  Product::orderBy('created_at', 'DESC')->where('feature', '=', 1)->take(16)->get();
        $products_sale =  Product::orderBy('created_at', 'DESC')->where('sale_amount', '>', 0)->take(16)->get();
        // $products_color =  Product::take(16)->get(); 
        // $product =  Product::find(1);
        // dd($product->color->toArray());

        // dd($this->products->take(5)->toArray());
        // dd($this->products->first()->productImage->first()->url);
        return view('clients.home', ['products' => $products, 'products_sale' => $products_sale]);
    }
    public function shop()
    {
        $products =  Product::orderBy('created_at', 'DESC')->paginate(15);
        return view('clients.shop', compact('products'));
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
