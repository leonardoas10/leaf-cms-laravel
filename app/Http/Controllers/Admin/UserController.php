<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\Hash;

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
 
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);    
        return redirect('admin/users'); 
    }

    public function show()
    {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.edit_user', compact('user'));
    }

    public function update(User $user, UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user->update($data);
        return redirect('admin/users'); 
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('admin/users');
    }
}
