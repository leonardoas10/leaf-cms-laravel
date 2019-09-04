<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\Category;
use App\Comment;

class BulkOperator extends Controller
{
    public function operate(Post $post, User $user, Category $category, Comment $comment, $operation) {
        $ids = request()->ids;
        $model = request()->model;

        switch ($model) {
            case 'post':
                $model = $post;
            break;
            case 'user':
                $model = $user;
            break;
            case 'category':
                $model = $category;
            break;
            case 'comment':
                $model = $comment;
            break;
        }

        switch($operation) {
            case 'Published':
                foreach ($ids as $id) {
                    $model->where('id', '=', $id)->update(['status' => 'Published']);
                }
            break;
            case 'Draft':
                foreach ($ids as $id) {
                    $model->where('id', '=', $id)->update(['status' => 'Draft']);
                }
            break;
            case 'Approved':
                foreach ($ids as $id) {
                    $model->where('id', '=', $id)->update(['status' => 'Approved']);
                }
            break;
            case 'Unapproved':
                foreach ($ids as $id) {
                    $model->where('id', '=', $id)->update(['status' => 'Unapproved']);
                }
            break;
            case 'Admin':
                foreach ($ids as $id) {
                    $model->where('id', '=', $id)->update(['role' => 'Admin']);
                }
            break;
            case 'Subscriber':
                foreach ($ids as $id) {
                    $model->where('id', '=', $id)->update(['role' => 'Subscriber']);
                }
            break;
            case 'Delete':
                foreach ($ids as $id) {
                    if($model === $post) { 
                        Comment::where('post_id',  $id)->delete();             
                    }
                    $model->where('id', '=', $id)->delete();
                }
            break; 
            case 'Clone':
                foreach ($ids as $id) {
                    if($model === $post) { 
                        $getPosts = Post::where('id',  $id)->get();
                        foreach ($getPosts as $getPost) {             
                            Post::create([
                                'title' => $getPost->title, 
                                'user' =>$getPost->user, 
                                'user_id' =>$getPost->user_id, 
                                'category_id' => $getPost->category_id,
                                'content' =>$getPost->content, 
                                'tags' =>$getPost->tags, 
                                'status' =>$getPost->status, 
                                'image' =>$getPost->image, 
                            ]);
                        }       
                    }
                    if($model === $category) { 
                        $getCategories = Category::where('id',  $id)->get();
                        foreach ($getCategories as $getCategory) {             
                            Category::create([
                                'title' => $getCategory->title, 
                            ]);
                        }       
                    }
                }
            break;
        }
    }
}
