<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuleCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $category = Category::orderBy('created_at', 'DESC')->paginate(5);
        $category = Category::orderBy('created_at', 'DESC')->search()->paginate(5);
        return view('admin.category.index', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuleCategory $request)
    {

        $name = trim(strip_tags($request->name)); //coa khoang trang truoc sau va html
        $slug = trim(strip_tags($request->slug));

        $cate = new Category();
        $cate->name = $name;
        $cate->slug = $slug;

        if ($cate->save()) {
            return redirect()->route('category.create')->with('add_cate_success', "Add Category $name sucessfully!");
        } else {
            return  redirect()->route('category.create')->with('add_cate_fail', "Add Category $name failed!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,)
    {
        //

        // dd(Category::find(1)->products()->count());
        $category = Category::find($id);
        dd($category->products->count);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
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
        $name = trim(strip_tags($request->name));
        $slug = trim(strip_tags($request->slug));
        $cate = Category::find($id);
        $cate->name = $name;
        $cate->slug = $slug;
        if ($cate->update()) {
            return redirect()->route('category.edit', [$id])->with('update_cate_success', "Updated");
        } else {
            return redirect()->route('category.edit', [$id])->with('update_cate_fail', "Update fail");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if ($category->products->count() > 0) {
            return redirect()->route('category.index')->with('del_cate_error', 'Can\'t delete this category because product instock');
        } else {

            $category->delete();
            return redirect()->route('category.index')->with('del_cate_success', 'Delete successfully!');
        }
    }
    //__custom

}
