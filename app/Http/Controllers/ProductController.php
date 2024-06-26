<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuleProduct;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('created_at', 'DESC')->search()->paginate(20);
        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $colors = Color::all();
        return view('admin.product.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuleProduct $request)
    {

        $image_url = null;
        if ($request->has('image')) {
            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $image_url = $file_name;
            $file->move(public_path('images'), $file_name);
        }
        $name = trim(strip_tags($request->name));
        $description = trim(strip_tags($request->description));
        $price = $request->price;
        $feature = ($request->feature === 'on') ? 1 : 0;
        $qty  = $request->qty;
        $sale_amount = $request->sale_amount ? $request->sale_amount : 0;
        $category_id = $request->category_id;
        $manufacture_id = $request->manufacture_id;
        $color_id = $request->color_id;
        $currentDate = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh');
        $product = new Product();
        $product->description = $description;
        $product->name = $name;
        $product->price = $price;
        $product->feature = $feature;
        $product->sale_amount = $sale_amount;
        $product->qty = $qty;
        $product->category_id = $category_id;
        $product->manufacture_id = $manufacture_id;
        $product->created_at = $currentDate;
        $product->updated_at = $currentDate;
        if ($product->save()) {
            $lastProduct = Product::orderBy('id', 'DESC')->first();
            ProductColor::create(['color_id' => $color_id, 'product_id' => $lastProduct['id']]);
            if ($image_url) {
                ProductImage::create(['name' => $name, 'url' => $image_url, 'product_id' => $lastProduct['id']]);
            }
            return redirect()->route('product.index')->with('add_product_1', 'Added!');
        }
        return redirect()->back()->with('add_product_0', 'Add fail!');
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
        $product = Product::find($id);
        return view('admin.product.show', compact('product'));
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
        $colors = Color::all();
        $product = Product::find($id);
        return view('admin.product.edit', ['product' => $product], compact('colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RuleProduct $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('update_product_0', 'Product not found!');
        }
        $name = trim(strip_tags($request->name));
        $description = trim(strip_tags($request->description));
        $price = $request->price;
        $feature = ($request->feature === 'on') ? 1 : 0;
        $qty  = $request->qty;
        $sale_amount = $request->sale_amount ? $request->sale_amount : 0;
        $category_id = $request->category_id;
        $manufacture_id = $request->manufacture_id;
        $color_id = $request->color_id;

        $product->description = $description;
        $product->name = $name;
        $product->price = $price;
        $product->feature = $feature;
        $product->sale_amount = $sale_amount;
        $product->qty = $qty;
        $product->category_id = $category_id;
        $product->manufacture_id = $manufacture_id;

        if ($product->save()) {
            ProductColor::updateOrCreate(['color_id' => $color_id, 'product_id' => $product->id]);
            // $lastProduct = Product::orderBy('id', 'DESC')->first();
            // ProductColor::updateOrCreate(['color_id' => $color_id, 'product_id' => $lastProduct['id']]);
            $image_url = null;
            if ($request->has('image')) {
                // dd('abc');
                $file = $request->image;
                $file_name = $file->getClientOriginalName();
                $image_url = $file_name;
                $file->move(public_path('images'), $file_name);
                ProductImage::updateOrCreate(['product_id' => $product->id, 'name' => $name, 'url' => $file_name]);
            }
            // if ($request->has('image')) {
            //     $file = $request->image;
            //     $file_name = $file->getClientOriginalName();
            //     $image_url = $file_name;
            //     $file->move(public_path('images'), $file_name);
            //     ProductImage::updateOrCreate(['product_id' => $product->id, 'name' => $name, 'url' => $file_name]);
            // }
            // ProductImage::updateOrCreate(['name' => $name, 'url' => $image_url, 'product_id' => $lastProduct['id']]);
            return redirect()->route('product.index')->with('update_product_1', 'Updated!');
        }
        return redirect()->back()->with('update_product_0', 'update fail!');
    }
    public function feature($id)
    {
        $product = Product::find($id);
        if ($product->feature) {
            $product->feature = 0;
        } else {
            $product->feature = 1;
        }
        $product->update();
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //note: when delete -> constraint( review, product_color, product_image)
        //
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('del_product_success', 'Delete successfully!');
    }
}
