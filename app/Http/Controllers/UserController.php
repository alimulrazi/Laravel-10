<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\factory;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); //lazy loading

        // $profile = User::find(1)->profile;

        // $posts = User::get(); //lazy loading
        $posts = User::with('posts')->get(); // one to many relationship with post with eger loading
        // $posts = User::has('posts')->get(); // only users that have at least one post
        // $posts = User::whereHas('posts', function($query){
        //     $query->where('created_at', '>=', '2015-01-01 00:00:00');
        // })->get(); // only users that have posts from 2015 on forward are returned

        // $posts = User::doesntHave('posts')->get(); // find those users who does not have any post


        // dd($posts);
        return view("users.index", compact(["users", "posts"]));
    }
}
