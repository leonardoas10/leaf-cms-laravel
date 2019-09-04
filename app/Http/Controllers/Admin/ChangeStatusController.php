<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;

class ChangeStatusController extends Controller
{
    public function updateRole(User $user)
    {
        $status = request()->role === "Admin" ? User::admin : User::subscriber;
        $user->update(['role' => $status]);
        
        return back();
    }
}
