<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        return view('admin.users', compact('users'));
    }

  
    public function create()
    {
        return view('admin.add_user');
    }

 
    public function store()
    {
        User::create(request()->all());
             
        return redirect('admin/users'); 
    }

    public function show(User $user)
    {
        return view('admin.profile');
    }

    public function edit(User $user)
    {
        return view('admin.edit_user', compact('user'));
    }


    public function update(User $user)
    {
        $user->update(request()->all());
        return redirect('admin/users'); 
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('admin/users');
    }
}
