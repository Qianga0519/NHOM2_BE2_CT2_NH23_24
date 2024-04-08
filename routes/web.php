<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
// Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
// Route::get('/blog_single', [HomeController::class, 'singleBlog'])->name('blog_single');
// Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
// Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
// Route::get('/product', [HomeController::class, 'product'])->name('product');
// Route::get('/regular', [HomeController::class, 'regular'])->name('regular');
// Route::get('/test', [HomeController::class, 'test'])->name('test');
Route::prefix('')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::get('shop', [HomeController::class, 'shop'])->name('shop');
    Route::get('blog', [HomeController::class, 'blog'])->name('blog');
    Route::get('blog_single', [HomeController::class, 'singleBlog'])->name('blog_single');
    Route::get('cart', [HomeController::class, 'cart'])->name('cart');
    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('product', [HomeController::class, 'product'])->name('product');
    Route::get('regular', [HomeController::class, 'regular'])->name('regular');
    Route::get('category/{slug}', [HomeController::class, 'view'])->name('view');
    Route::get('product/{id}', [HomeController::class, 'product'])->name('product');
});


// Route::group(['prefix' => ''], function () {
//     Route::resource('/', HomeController::class);
// });
// Route::resource('/', HomeController::class)->except(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

Route::group(['prefix' => '4admin'], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resources([
        'category' => CategoryController::class, //CURD USER
        // 'role' => RoleController::class,
    ]);
});
