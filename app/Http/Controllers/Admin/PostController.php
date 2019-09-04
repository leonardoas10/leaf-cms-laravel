<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use App\User;

use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all(); 
        $posts = $posts->map(function ($post) {
            $post->title = ucwords($post->title); //TODO seguir ...
            return $post;
        });

        return view('admin.post', compact('posts'));
    }
   
    public function create()
    {
        $categories = Category::all();
        $users = User::all();   
        return view('admin.add_post', compact('categories', 'users'));
    }
 
    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;  

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
        $users = User::all();  
        $categories = Category::all();
        return view('admin.edit_post', compact('post','users','categories'));
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

// class myClass {
//     public $myservice;
//     public function __construct(Post $post)
//     {
//         $this->myservice = $post;
//         $this->myservice->all();   
//     }
//     public function setmyservice(Post $post) {
//         $this->myservice = $post;

//     }
// }

// $nuevaclase = new myClass(new Post());
// $nuevaclase->myservice->all(); 

// $nuevaclase->setmyservice(new Post);