<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;

class AdminController extends Controller
{
    public function index() {
        $comments = auth()->user()->comments;
        $posts = auth()->user()->posts;
        return view('admin.index', compact('categories', 'comments', 'posts'));
    }

    public function show(Post $post) {
        return view('client.subviews.post', ['post' => $post]);
    }
}
