<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Role;


class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function users()
    {
        $users = User::orderBy('created_at', 'DESC')->search()->paginate(50);
        return view('admin.user.index', compact('users'));
    }
    public function roles()
    {
        $roles = Role::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.role.index', compact('roles'));
    }
    public function review()
    {
        $reviews = Review::orderBy('id', 'DESC')->search()->paginate(10);
        return view('admin.review.index', compact('reviews'));
    }
}
