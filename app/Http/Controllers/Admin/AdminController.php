<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Comment;
use App\Post;

class AdminController extends Controller
{
    public function index() {
        $comments = Comment::where('user_id', auth()->user()->id);
        $posts = Post::where('user_id', auth()->user()->id); 
        return view('admin.index', compact('categories', 'comments', 'posts'));
    }

    public function show(Post $post) {
        return view('client.subviews.post', ['post' => $post]);
    }
}
