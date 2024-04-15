<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class ReviewController extends Controller
{
    //
    public function create(Request $request, $id)
    {
        $rate = $request->rate;

        $product_id = $id;

        $content = $request->content;
        if ($rate == null) {
            return redirect()->back()->with('choose_star', 'Please! Choose review star');
        }

        // dd($request->toArray(), $id);
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $data = ['rate' => $rate, 'content' => $content, 'user_id' => $user_id, 'product_id' => $product_id];
            if (Review::create($data)) {
                return redirect()->back()->with('review_1', 'Added!');
            }
        }
        return redirect()->route('login');
    }
    public function update(Request $request, $id)
    {
        $rate = $request->rate;
        $user_id = Auth::user()->id;
        $product_id = $id;
        $content = $request->content;
        $data = ['rate' => $rate, 'content' => $content, 'user_id' => $user_id, 'product_id' => $product_id];
        $review = Review::where('user_id', $user_id)->where('product_id', $product_id)->first();
        if ($review) {
            $review->content = $content;
            $review->rate = $rate;
            if ($review->save()) {
                return redirect()->back()->with('review_update_1', 'Updated!');
            }
        }


        return redirect()->back()->with('review_update_0', 'Update fail!');
    }
    public function delete($id)
    {

        $user_id = Auth::user()->id;
        $product_id = $id;
        $review = Review::where('user_id', $user_id)->where('product_id', $product_id)->first();
        if ($review) {

            if ($review->delete()) {
                return redirect()->back()->with('review_update_1', 'Updated!');
            }
        }


        return redirect()->back()->with('review_update_0', 'Update fail!');
    }
}
