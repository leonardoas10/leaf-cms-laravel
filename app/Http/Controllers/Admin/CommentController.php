<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments', compact('comments'));
    }

    public function create()
    {
        //
    }

    public function store(Post $post)
    {
        $post->comments()->create(request()->all());
             
        return redirect('/'); // TODO CHANGE THS
    }

    public function show(Comment $comment)
    {
        //
    }

    public function edit(Comment $comment)
    {
        //
    }

    public function update(Comment $comment)
    {
        dd("aqui update");
        $comment->request()->has('status') ? 'approved' : 'unapproved';

        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect('admin/comments');
    }
}
