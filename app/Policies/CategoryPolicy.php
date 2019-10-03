<?php

namespace App\Policies;

use App\User;
use App\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function view(User $user)
    {
        $user->isAdmin();
    }

    public function update(User $user, Category $category)
    {
        $user->isAdmin();
    }

    public function delete(User $user, Category $category)
    {
        $user->isAdmin();
    }

}
