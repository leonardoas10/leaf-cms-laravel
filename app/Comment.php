<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'author', 'email', 'content', 'post_id', 'status'
    ];
    public function post()
    {
      return $this->belongsTo(Post::class);
    }
    public function approved()
    {
        return $this->update(['status' => 'Approved']);
    }
    public function unapproved() 
    {
        return $this->update(['status' => 'Unapproved']);
    }
}
