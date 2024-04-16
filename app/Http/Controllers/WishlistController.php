<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    //
    public function index()
    {
        $user_id = Auth::user()->id;
        $wishlist_user = Wishlist::where(['user_id' => $user_id])->get();
        return view('clients.wishlist', compact('wishlist_user'));
    }

    public function update($id, Request $request)
    {
        // $cart = Cart::find($id);
        // dd($request->qtity);
    }
    public function add_del(Product $product, Request $request)
    {
        $user_id = Auth::user()->id;
        $product_id = $product->id;

        $data = [
            'user_id' => $user_id,
            'product_id' => $product_id,
        ];
        $product_exist = Wishlist::where(['user_id' => $user_id, 'product_id' => $product_id])->first();

        if ($product_exist) {
            $product_exist->delete();
            return redirect()->back()->with('delele_wishlist_1', 'Deleted!');
        } else {
            if (Wishlist::create($data)) {
                return redirect()->back()->with('add_to_wishlist_1', 'Added!');
            }
        }
        return redirect()->back()->with('add_to_wishlist_0', 'Add fail!');
    }

    public function clear()
    {
        $user_id = Auth::user()->id;
        Wishlist::where(['user_id' => $user_id])->delete();
        return redirect()->back()->with('delete_wishlist_all_1', 'Cleared');
    }
}
