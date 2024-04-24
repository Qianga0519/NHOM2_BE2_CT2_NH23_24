<?php

namespace App\Http\Controllers;

use App\Http\Requests\RulePost;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->search()->paginate(10);
        //
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RulePost $request)
    {
        $title = preg_replace('/\s+/', ' ', $request->title);
        $content = trim($request->content);
        $image_url = null;
        if ($request->has('image')) {
            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $image_url = $file_name;
            if ($image_url) {
                $file->move(public_path('images'), $file_name);
                Post::create(['title' => $title, 'content' => $content, 'user_id' => Auth::user()->id]);
                $lastPost = Post::orderBy('id', 'DESC')->first();
                PostImage::create(['name' => $title, 'url' => $image_url, 'post_id' => $lastPost->id]);
                return redirect()->route('post.index')->with('add_post_1', 'Added!');
            }
        }
        return redirect()->route('post.index')->with('add_post_0', 'Add fail!');
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
        $post = Post::find($id);
        if ($post) {
            return view('admin.post.edit', compact('post'));
        }
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
        $title = preg_replace('/\s+/', ' ', $request->title);
        $content = trim($request->content);
        $image_url = null;
        $post = Post::find($id);
        if ($post) {
            $post->title = $title;
            $post->content = $content;
            $post->save();
            if ($request->has('imageEdit')) {
                $file = $request->imageEdit;
                $file_name = $file->getClientOriginalName();
                $image_url = $file_name;
                if ($image_url) {
                    $postImg = PostImage::where('post_id', $id)->first();
                    if ($postImg) {
                        $postImg->delete();
                    }
                    PostImage::updateOrCreate(['name' => $title, 'url' => $image_url, 'post_id' => $id]);
                    $file->move(public_path('images'), $file_name);
                }
            }
            return redirect()->back()->with('edit_post_1', 'Edited!');
        }

        return redirect()->back()->with('edit_post_0', 'Edit fail!');
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
        $post = Post::find($id);
        $postImage = PostImage::where('post_id', $post->id);
        $postImage->delete();
        $post->delete();
        return redirect()->back()->with('del_post_1', 'Deleted!');
    }
}
