<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'author', 'email', 'content'
    ];
    public function post()
    {
      return $this->belongsTo(Post::class);
    }
    public function approved($status = "Approved")
    {
        return $this->update(compact('status'));
    }
    public function unapproved() 
    {
        $this->approved("Unapproved");
    }
}
