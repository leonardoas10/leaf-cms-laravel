<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \App\Category;
use \App\Post;

class HomeController extends Controller
{
    public function index(Category $category) {
        $search = request('search');
        
        if($category->exists) {
            $posts = $category->posts()->paginate(3);
        } else if($search) {
            $word = '%' . $search . '%';
            $posts = Post::where("tags", "like", $word)->paginate(3);
        }
        else {
            $posts = Post::paginate(3);
        }

        return view('client.index', compact('posts'));
    }

    public function show(Post $post) {
        $post->incrementViews();
        return view('client.subviews.post', compact('post'));
    }
}
