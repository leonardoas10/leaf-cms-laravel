<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use App;

use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all(); 

        $posts = $posts->map(function ($post) {
            $post->title = ucwords($post->title);
            $post->user = ucwords($post->user);
            $post->category_id = ucwords($post->category_id);
            $post->tags = ucwords($post->tags);
            if (App::isLocale('es') && $post->status === "Published") {
                $post->status = "Publicado";
            }
            if (App::isLocale('es') && $post->status === "Draft") {
                $post->status = "Borrador";
            }
            return $post;
        });

        $subscribers_posts = $posts->where('user_id', auth()->user()->id);

        return view('admin.post', compact('posts', 'subscribers_posts'));
    }
   
    public function create()
    {
        $categories = Category::all();
        return view('admin.add_post', compact('categories'));
    }
 
    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['user'] = auth()->user()->username;  

        $data = $request->validate([
            'title' => 'unique:posts',
        ]);

        if($request->hasFile('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('/', $fileName);
            $data['image'] = $fileName;
        }

        Post::create( $data );
        return redirect('admin/posts'); 
    }

    public function show($id)
    {
        //
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.edit_post', compact('post','categories'));
    }

    public function update(Post $post, PostRequest $request)
    {
        $data = $request->all();

        if($request->hasFile('image')) {
            // Storage::delete($post->photo); TODO
            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('/', $fileName);
            $data['image'] = $fileName;
        }

        $post->update($data);
        return redirect('admin/posts'); 
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('admin/posts');
    }
}