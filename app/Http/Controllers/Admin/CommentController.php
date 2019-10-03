<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Comment;
use App\Post;
use App\Http\Requests\CommentRequest;
use App;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->get();

        $comments = $comments->map(function ($comment) {
            $comment->content = ucwords($comment->content);
            if (App::isLocale('es') && $comment->status === "Approved") {
                $comment->status = "Aprovado";
            }
            if (App::isLocale('es') && $comment->status === "Unapproved") {
                $comment->status = "Desaprovado";
            }
            return $comment;
        });

        if(auth()->user()->role === 'Subscriber') {
            $my_posts = auth()->user()->posts;
            $my_comments = auth()->user()->comments;

            $comments = $my_posts->pluck('comments')->collapse()->merge($my_comments)->unique()->sortByDesc('created_at');
        }

        return view('admin.comments', compact('comments'));
    }

    public function create()
    {
        //
    }

    public function store(Post $post, CommentRequest $request)
    {
        $post->addComment($request->all()); 
        return back()->with('success', __('success.store_comment'));
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
        if (request()->status === "Approved" || request()->status === "Aprovado") {
            $comment->approved();
        } else {
            $comment->unapproved();
        }
        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect('admin/comments')->with('success', __('success.delete_comment'));
    }
}
