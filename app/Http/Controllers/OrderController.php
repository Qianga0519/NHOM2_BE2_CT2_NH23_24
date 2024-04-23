<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\OrderItem;
use Carbon\CarbonTimeZone;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $orders = Order::orderByDesc('order_date')->search()->paginate(10);
        $orders = Order::orderByDesc('order_date')->paginate(10);
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {



        $note =  preg_replace('/\s+/', ' ', $request->note);
        //
        $user_id = Auth::user()->id;
        $cart_user = Cart::where(['user_id' => $user_id])->get();
        $total = 0;
        foreach ($cart_user as $value) {
            $total += ($value->qty * $value->price);
        }

        Order::create([
            'note' => $note, 'shipping' => 50000, 'total' => $total, 'user_id' => $user_id
        ]);
        $orders = Order::orderByDesc('created_at')->where('user_id', $user_id)->first();
        // qty	price	discount	color_id	order_id	product_id

        foreach ($cart_user as $value) {

            OrderItem::create(
                [
                    'qty' => $value->qty, 'price' => $value->price, 'discount' => 0,
                    'order_id' =>  $orders->id, 'color_id' => $value->color->id,
                    'product_id' => $value->product->id
                ]
            );
        };
        Cart::where(['user_id' => $user_id])->truncate();

        return redirect()->route('cart')->with('order_1', 'Order success!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);


        OrderItem::where('order_id', $id)->truncate();
        $order->delete();
        return redirect()->back()->with('del_order_1', 'Deleted!');
    }
}
