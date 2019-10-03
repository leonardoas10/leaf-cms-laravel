<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    
    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
    public function create(User $user)
    {
        $user->isAdmin();
    }

    public function update(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    public function delete(User $user)
    {
        $user->isAdmin();
    }
}
