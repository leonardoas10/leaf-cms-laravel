<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use App\Comment;
use App\Post;
use App\User;
// TODO reciclar

class DashboardController extends Controller
{
    public function index() {
        $categories = Category::all(); 
        $comments = Comment::all(); 
        $posts = Post::all(); 
        $users = User::all(); 

        return view('admin.dashboard', compact('categories', 'comments', 'posts', 'users'));
    }
}
