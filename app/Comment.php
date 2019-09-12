<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'author', 'email', 'content', 'post_id', 'status', 'user_id'
    ];
    public function post()
    {
      return $this->belongsTo(Post::class);
    }
    public function user()
    {
      return $this->belongsTo(User::class);
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
