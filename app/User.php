<?php

namespace App;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Cache;
use Illuminate\Foundation\Auth\User as Authenticable;

class User extends Authenticable
{
    use Notifiable;
    const admin = 'Admin';
    const subscriber = 'Subscriber';

    protected $fillable = [
        'username', 'password', 'firstname', 'lastname', 'email', 'image', 'role', 'last_activity', 'provider', 'provider_id'
    ];
    
    public function posts() {
        return $this->hasMany(Post::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function userIsOnline() {
        return Cache::has('user-is-online'. $this->id);
    }
}
