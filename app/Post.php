<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'category_id', 'user_id', 'title', 'user', 'image', 'content', 'tags', 'status', 'views_count', 'likes'
    ];
    public function category()
    {
      return $this->belongsTo(Category::class);
    }
    public function comments()
    {
      return $this->hasMany(Comment::class);
    }
    public function addComment($comment) {
      $this->comments()->create($comment);
    }

    public function incrementViews() {
      return $this->increment('views_count');
    }
}
