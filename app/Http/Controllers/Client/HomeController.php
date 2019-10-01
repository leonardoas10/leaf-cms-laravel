<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use \App\Category;
use \App\Post;

class HomeController extends Controller
{
    public function index(Category $category) {
        $search = request('search');
        
        if($category->exists) {
            $posts = $category->posts()->latest()->paginate(2);
        } 
        else if($search) {
            $word = '%' . $search . '%';
            $posts = Post::latest()->where("tags", "like", $word)->paginate(2);
            if($posts->count() === 0) {
                return back()->with('danger', __('danger.not_found') . $search);
            }
            request()->session()->flash('success', __('success.we_found') . $search); 
        }
        else {
            $posts = Post::latest()->paginate(2);
        }

        return view('client.index', compact('posts'));
    }

    public function show(Post $post) {
        $post->incrementViews();
        return view('client.subviews.post', compact('post'));
    }
}
