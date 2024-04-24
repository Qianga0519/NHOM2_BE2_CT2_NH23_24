<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Manufacture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Wishlist;
use Illuminate\Support\Carbon;
use App\Models\Contact;
use App\Models\Post;

class HomeController extends Controller
{
    protected $products;
    protected $categories;
    protected $banners;
    protected $cate;
    protected $prod;
    protected $banner;
    protected $post;
    public function __construct()
    {
        $this->products =  Product::get();
        $this->categories =  Category::get();
        $this->banners =  Banner::get();
        $this->cate = new Category();
        $this->prod = new Product();
        $this->banner = new Banner();
        $this->post = new Post();
    }
    public function index()
    {
        $products =  $this->prod->productFeature()->take(16)->get();
        $products_sale =  $this->prod->productSale()->take(16)->get();
        $lastProduct =  $this->products->find(12);
        $products_rate = Product::withCount('reviews')->orderByDesc('reviews_count')->take(16)->get();
        $wishlists = Wishlist::get();
        $currentDate = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh');
        $endOfWeek = $currentDate->copy()->endOfWeek();
        $startOfWeek = $currentDate->copy()->startOfWeek();
        $deal_end_week = $endOfWeek;
        $products_deal_of_week = $this->prod->productSale()
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('clients.home', [
            'products' => $products,
            'products_sale' => $products_sale,
            'lastProduct' => $lastProduct,
            'products_rate' => $products_rate,
            'wishlists' => $wishlists,
            'pdofw' => $products_deal_of_week,
            'deal_end_week' => $deal_end_week,
        ]);
    }

    public function blog()
    {
        $posts =  $this->post->paginate(3);
        return view('clients.blog', compact('posts'));
    }
    public function singleBlog($id)
    {
        $post =  Post::find($id);
        if ($post) {
            return view('clients.blog_single', compact('post'));
        }
        abort(404);
    }
    public function contact()
    {
        return view('clients.contact');
    }
    public function store(Request $request)
    {
        $name =  preg_replace('/\s+/', ' ', $request->name);
        $email =  preg_replace('/\s+/', ' ', $request->email);
        $subject =  preg_replace('/\s+/', ' ', $request->subject);
        $message =  preg_replace('/\s+/', ' ', $request->message);
        Contact::create(['name' => $name, 'email' => $email, 'message' => $message, 'subject' => $subject]);
        return redirect()->back()->with('contact_1', "Sended!");
    }
    public function product($id)
    {

        if (!is_numeric($id) || $id <= 0) {
            abort(404);
        } else {
            $product = Product::find($id);
            if (!$product) {
                abort(404);
            } else {
                return view('clients.product', compact('product'));
            }
        }
        abort(404);
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
    public function view_1($slug)
    {
        $manus = Manufacture::where('slug', $slug)->first();
        $products = $manus->products()->paginate(15);
        return view('clients.shop', compact('manus', 'products'));
    }
    public function shop()
    {
        $products =  Product::orderBy('created_at', 'DESC')->search()->paginate(15);
        return view('clients.shop', compact('products'));
    }
}
