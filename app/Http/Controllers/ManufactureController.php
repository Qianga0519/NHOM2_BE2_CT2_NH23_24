<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuleCategory;
use App\Http\Requests\RuleManufature;
use App\Models\Manufacture;
use App\Models\ManufactureImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $manus = Manufacture::orderBy('created_at', 'DESC')->search()->paginate(15);
        return view('admin.manufacture.index', compact('manus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.manufacture.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuleManufature $request)
    {
        $image_url = null;
        if ($request->has('image')) {
            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $image_url = $file_name;
            $file->move(public_path('images'), $file_name);
        }
        $name = trim(strip_tags($request->name));
        $slug = trim(strip_tags($request->slug));
        $country = trim(strip_tags($request->country));
        $currentDate = Carbon::now()->setTimezone('Asia/Ho_Chi_Minh');
        $manu = new Manufacture();
        $manu->country = $country;
        $manu->slug = $slug;
        $manu->name = $name;
        $manu->created_at = $currentDate;
        $manu->updated_at = $currentDate;

        if ($manu->save()) {
            $lastManu = Manufacture::orderBy('id', 'DESC')->first();

            if ($image_url) {
                ManufactureImage::create(['name' => $name, 'url' => $image_url, 'manufacture_id' => $lastManu['id']]);
            }
            return redirect()->route('manufacture.index')->with('add_manufacture_1', 'Added!');
        }
        return redirect()->back()->with('add_manufacture_0', 'Add fail!');
        // dd($request->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);  //
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
        $manu = Manufacture::find($id);
        return view('admin.manufacture.edit', compact('manu'));
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
        abort(404); //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $manu = Manufacture::find($id);
        if ($manu->products->count() > 0) {

            return redirect()->back()->with('del_manu_0', 'Delete fail!');
        }
        $manu->delete();
        return  redirect()->back()->with('del_manu_1', "Deleted!");
    }
}
