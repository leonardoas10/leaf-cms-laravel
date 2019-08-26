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
    public function admin()
    {
        return $this->update(['role' => 'Admin']);
    }
    public function subscriber() 
    {
        return $this->update(['role' => 'Subscriber']);
    }

    const admin = 'Admin';
    const subscriber = 'Subscriber';
}
