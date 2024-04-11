<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    protected $products;
    protected $categories;
    protected $banners;
    protected $cate;
    protected $prod;
    protected $banner;
    // protected $route_page;
    public function __construct()
    {
        $this->products =  Product::get();
        $this->categories =  Category::get();
        $this->banners =  Banner::get();
        $this->cate = new Category();
        $this->prod = new Product();
        $this->banner = new Banner();
    }
    public function index()
    {
        $products =  $this->prod->productFeature()->take(16)->get();
        $products_sale =  $this->prod->productSale()->take(16)->get();
        // $lastProduct =  $this->products->sortBy('created_at')->first();
        $lastProduct =  $this->products->find(12);
        $products_rate = Product::withCount('reviews')->orderByDesc('reviews_count')->take(16)->get();

        // dd($lastProduct->banner->first()->image->url);
        // $lastBanner = $this->banners->sortBy('created_at')->first();
        // $products_color =  Product::take(16)->get(); 
        // $product =  Product::find(1);
        // dd($product->productImage->toArray());
        // dd($this->products->take(5)->toArray());
        // dd($this->products->first()->productImage->first()->url);
        return view('clients.home', [
            'products' => $products,
            'products_sale' => $products_sale,
            'lastProduct' => $lastProduct,
            'products_rate' => $products_rate
        ]);
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

    public function product($id)
    {
        $product = Product::find($id);

        // $colors = $product->colors;
        // dd($colors->last()->hex);
        // $user = User::find(2);
        // dd($user->avatar->url);
        // dd($product->review->user);
        return view('clients.product', compact('product'));
    }
    public function regular()
    {
        return view('clients.regular');
    }
    public function view($slug)
    {
        $cates = Category::where('slug', $slug)->first();
        $products = $cates->products()->paginate(15);
        return view('clients.shop', compact('cates', 'products'));
    }
    public function shop()
    {
        $products =  Product::orderBy('created_at', 'DESC')->search()->paginate(15);
        return view('clients.shop', compact('products'));
    }
}
