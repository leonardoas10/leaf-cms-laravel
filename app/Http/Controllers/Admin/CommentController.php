<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Comment;
use App\Post;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        $comments = $comments->map(function ($comment) {
            $comment->content = ucwords($comment->content);
            return $comment;
        });

        $posts = Post::all();
        $posts = $posts->where('user_id', auth()->user()->id);
        $subscribers_comments = $posts->pluck('comments')->collapse();

        return view('admin.comments', compact('comments', 'subscribers_comments'));
    }

    public function create()
    {
        //
    }

    public function store(Post $post, CommentRequest $request)
    {
        $post->addComment($request->all());
        return back();
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
        if (request()->status === "Approved") {
            $comment->approved();
        } else {
            $comment->unapproved();
        }

        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect('admin/comments');
    }
}
