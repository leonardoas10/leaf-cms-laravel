<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

class ChangeStatusController extends Controller
{
    public function updateRole(User $user)
    {
        // TODO
        // $a = request()->all();
        // dd($user->id);
        // if(request('Subscriber')) {
        //     dd('its subscriber');
        // }
        // $user->update(request()->all());
        return redirect('admin/users'); 
    }
}
