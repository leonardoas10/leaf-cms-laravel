<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'username', 'password', 'firstname', 'lastname', 'email', 'image', 'role'
    ];
    
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
