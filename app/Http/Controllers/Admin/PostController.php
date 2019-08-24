<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Storage;

//  use App\Http\Requests\PostStoreRequest; TODO validation


class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::all();   
        return view('admin.post', compact('posts'));
    }
   
    public function create()
    {
        $categories = Category::all();
        $users = User::all();   
        return view('admin.add_post', compact('categories', 'users'));
    }
 
    public function store()
    {
        $validated = request()->validate([
            'title' => 'required',
            'category_id' => 'required',
            'user' => 'required',
            'content' => 'required',
            'tags' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        if(request()->hasFile('image')) {
            $fileName = request()->file('image')->getClientOriginalName();
            request()->file('image')->storeAs('/', $fileName);
            $validated['image'] = $fileName;
        }

        Post::create( $validated );
       
        return redirect('admin/posts'); 
    }

    public function show($id)
    {
        //
    }

    public function edit(Post $post)
    {
        $users = User::all();  
        $categories = Category::all();
        return view('admin.edit_post', compact('post','users','categories'));
    }

    public function update(Post $post)
    {
        $validated = request()->validate([
            'title' => 'required',
            'category_id' => 'required',
            'user' => 'required',
            'content' => 'required',
            'tags' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        if(request()->hasFile('image')) {
            // Storage::delete($post->photo);
            $fileName = request()->file('image')->getClientOriginalName();
            request()->file('image')->storeAs('/', $fileName);
            $validated['image'] = $fileName;
        }

        $post->update($validated);

        return redirect('admin/posts'); 
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('admin/posts');
    }
}
