<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App;

class UserController extends Controller
{
    public function index()
    {   
        $users = User::all(); 
        $users = $users->map(function ($user) {
            $user->username = ucwords($user->username);
            $user->firstname = ucwords($user->firstname);
            $user->lastname = ucwords($user->lastname);
            if (App::isLocale('es') && $user->role === "Admin") {
                $user->role = "Administrador";
            }
            if (App::isLocale('es') && $user->role === "Subscriber") {
                $user->role = "Suscriptor";
            }
            return $user;
        });
        return view('admin.users', compact('users'));
    }

    public function create()
    {
        $this->authorize('create', User::class);

        return view('admin.add_user');
    }
 
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
    
        if($request->hasFile('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('/', $fileName);
            $data['image'] = $fileName;
        }

        User::create($data);    
        
        return redirect('admin/users')->with('success', __('success.create_user') . ' ' . ucwords($data['username'])); 

    }

    public function show()
    {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $user['username'] = ucwords($user['username']);
        $user['firstname'] = ucwords($user['firstname']);
        $user['lastname'] = ucwords($user['lastname']);
        
        return view('admin.edit_user', compact('user'));
    }

    public function update(User $user, UserEditRequest $request)
    {
        $this->authorize('update', $user);

        $data = $request->all();
  
        if($data['password'] === null) {
            $data = $request->except('password');
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        if(auth()->user()->provider_id === null) {
            $request['username'] = 'required|alpha|min:3';
        }

        if($request->hasFile('image')) {
            // Storage::delete($post->photo); TODO
            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('/', $fileName);
            $data['image'] = $fileName;
        }

     
        $user->update($data);

        return redirect('admin/profile/1')->with('success', __('success.update_user') . ' ' . $data['firstname'] . ' ' . $data['lastname']); 
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();
    
        return redirect('admin/users')->with('success', __('success.delete_user'));
    }

    public function lastActivity()
    {   
        return User::where('last_activity', '>=', Carbon::now()->subMinute(1))->get('last_activity')->count();
    }

    public function updateRole(User $user)
    {
        if (request()->role === "Admin" || request()->role === "Administrador") {
            $user->update(['role' => 'Admin']);
        } else {
            $user->update(['role' => 'Subscriber']);
        }
        
        return back();
    }
}
