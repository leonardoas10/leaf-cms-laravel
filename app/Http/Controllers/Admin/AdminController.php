<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use App\Comment;
use App\Post;

class AdminController extends Controller
{
    public function index() {
        
        $categories = Category::all(); 
        $comments = Comment::all(); 
        $posts = Post::all(); 
        return view('admin.index', compact('categories', 'comments', 'posts'));
    }

    public function show(Post $post) {
        return view('client.subviews.post', ['post' => $post]);
    }
}
