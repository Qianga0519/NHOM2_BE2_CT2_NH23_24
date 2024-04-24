<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $cart_user = Cart::where(['user_id' => $user_id])->get();
        // dd($cart_user->first()->product->first()->productImage->first()->url);
        // dd($cart_user->first()->color->hex);
        return view('clients.cart', compact('cart_user'));
    }

    public function update($id, Request $request)
    {
        $cart = Cart::find($id);
        dd($request->qtity);
    }
    public function add(Product $product, Request $request)
    {
        $color_id =  $request->product_color ?  $request->product_color : 1;
        $user_id = Auth::user()->id;
        $product_id = $product->id;
        $qty = $request->qty ? $request->qty : 1;
        $price = $product->sale_amount > 0 ? ($product->price - $product->sale_amount) : ($product->price);
        $data = [
            'user_id' => $user_id,
            'product_id' => $product_id,
            'price' => $price,
            'qty' => $qty,
            'color_id' => $color_id,
        ];
        $product_exist = Cart::where(['user_id' => $user_id, 'product_id' => $product_id, 'color_id' => $color_id])->first();

        if ($product_exist) {
            $product_exist->qty += $qty;
            $product_exist->price = $price;
            $product_exist->save();
            return redirect()->back()->with('add_to_cart_update', 'Updated!');
        } else {
            if (Cart::create($data)) {
                return redirect()->back()->with('add_to_cart_1', 'Added!');
            }
        }
        return redirect()->back()->with('add_to_cart_0', 'Add fail!');
    }
    public function delete($id)
    {
        Cart::destroy($id);
        return redirect()->back()->with('delete_cart_1', 'Deleted');
    }
    public function clear()
    {
        // $user_id = Auth::user()->id;
        // Cart::where(['user_id' => $user_id])->delete();
        // return redirect()->back()->with('delete_cart_all_1', 'Cleared');
        $user_id = Auth::user()->id;
        Cart::where('user_id', $user_id)->delete();
        return response()->json(['message' => 'Cleared']);
    }
}
