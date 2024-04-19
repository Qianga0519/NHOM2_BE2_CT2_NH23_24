<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WishlistController;
use App\Models\Category;
use Illuminate\Routing\Controllers\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('clients.shop');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::prefix('/')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::get('shop', [HomeController::class, 'shop'])->name('shop');
    Route::get('blog', [HomeController::class, 'blog'])->name('blog');
    Route::get('blog_single', [HomeController::class, 'singleBlog'])->name('blog_single');
    Route::get('cart', [HomeController::class, 'cart'])->name('cart');
    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('regular', [HomeController::class, 'regular'])->name('regular');
    Route::get('category/{slug}', [HomeController::class, 'view'])->name('view');
    Route::get('manufacture/{slug}', [HomeController::class, 'view_1'])->name('view_1');
    Route::get('product/{id}', [HomeController::class, 'product'])->name('product');
});
Route::prefix('/reiew')->group(function () {
    Route::get('create/{id}', [ReviewController::class, 'create'])->name('review.create');
    Route::get('update/{id}', [ReviewController::class, 'update'])->name('review.update');
    Route::get('delete/{id}', [ReviewController::class, 'delete'])->name('review.delete');
});

Route::group(['prefix' => 'cart', 'middleware' => 'check.login'], function () {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::get('/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/delete/{product}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
});
Route::group(['prefix' => 'wishlist', 'middleware' => 'check.login'], function () {
    Route::get('/', [WishlistController::class, 'index'])->name('wishlist');
    Route::get('/add_del/{product}', [WishlistController::class, 'add_del'])->name('wishlist.add_del');
    Route::get('/update/{product}', [WishlistController::class, 'update'])->name('wishlist.update');
    Route::get('/clear', [WishlistController::class, 'clear'])->name('wishlist.clear');
});
// Route::group(['prefix' => ''], function () {
//     Route::resource('/', HomeController::class);
// });
// Route::resource('/', HomeController::class)->except(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

Route::group(['prefix' => '4admin', 'middleware' => 'checkAdmin'], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/product/feature/{id}', [ProductController::class, 'feature'])->name('product.feature');
    Route::resources([
        'category' => CategoryController::class, //CURD Category
        'product' => ProductController::class, //CURD Poduct

        'product-image' => ProductImageController::class,
    ]);
});
