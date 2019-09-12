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
        }
    }
}
