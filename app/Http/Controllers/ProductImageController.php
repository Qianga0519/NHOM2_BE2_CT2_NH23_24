<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Validator;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);     //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);  //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $product = Product::find($request->product_id);
        $image_url = null;
        if ($request->has('image')) {
            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $image_url = $file_name;

            if ($image_url) {
                ProductImage::create(['name' => $product->name, 'url' => $image_url, 'product_id' => $product->id]);
                $file->move(public_path('images'), $file_name);
                return redirect()->back()->with('add_product_image_1', 'Added!');
            }
        }
        return redirect()->back()->with('add_product_image_0', 'Add fail!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // abort(404);
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



        if (!$id) {
            abort(404);
        }
        $pro_image = ProductImage::find($id);
        $name = $request->pro_image_name;
        $image_url = null;
        if ($name) {
            $pro_image->name = $name;
            $pro_image->save();
        }
        if ($request->has('image')) {
            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $image_url = $file_name;

            if ($image_url) {
                $pro_image->url = $image_url;
                $pro_image->save();
                $file->move(public_path('images'), $file_name);
                return redirect()->back()->with('edit_product_image_1', 'Updated!');
            } else {
                return redirect()->back()->with('edit_product_image_null', 'Please, choose image!');
            }
        }
        return redirect()->back()->with('edit_product_image_0', 'Update fail!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $product = ProductImage::find($id);
        $product->delete();
        return redirect()->back()->with('del_product_image_1', 'Delete successfully!');
    }
}
