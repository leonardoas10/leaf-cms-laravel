<?php

namespace App;

use Cache;
use Illuminate\Foundation\Auth\User as Authenticable;

class User extends Authenticable
{
    const admin = 'Admin';
    const subscriber = 'Subscriber';

    protected $fillable = [
        'username', 'password', 'firstname', 'lastname', 'email', 'image', 'role'
    ];
    
    public function posts() {
        return $this->hasMany(Post::class);
    }
    public function userIsOnline() {
        return Cache::has('user-is-online'. $this->id);
    }
}
