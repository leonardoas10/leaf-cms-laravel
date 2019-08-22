<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
//  use App\Http\Requests\PostStoreRequest; TODO validacion


class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::all();   
        return view('admin.post', ['posts' => $posts]);
    }
   
    public function create()
    {
        $categories = Category::all();
        $users = User::all();   
        return view('admin.add_post', compact('categories', 'users'));
    }
 
    public function store(PostStoreRequest $request)
    {
        Post::create(request()->all());
             
        return redirect('admin/posts'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        $post->update(request()->all());
        return redirect('admin/posts'); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('admin/posts');
    }
}
