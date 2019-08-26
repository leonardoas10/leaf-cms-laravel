<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

class ChangeStatusController extends Controller
{
    public function updateRole(User $user)
    {

        if (request()->role === "Admin") {
            // $user->admin();
            $user->update(['role' => User::admin]);
        } else {
            // $user->subscriber();
            $user->update(['role' => User::subscriber]);
        }

        return back();
    }
}
