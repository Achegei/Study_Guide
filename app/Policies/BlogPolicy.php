<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BlogPolicy
{
    public function viewAny(User $user): bool
{
    return $user->role_id === 1;
}

public function view(User $user, Blog $blog): bool
{
    return $user->role_id === 1;
}

public function create(User $user): bool
{
    return $user->role_id === 1;
}

public function update(User $user, Blog $blog): bool
{
    return $user->role_id === 1;
}

public function delete(User $user, Blog $blog): bool
{
    return $user->role_id === 1;
}

public function restore(User $user, Blog $blog): bool
{
    return $user->role_id === 1;
}

public function forceDelete(User $user, Blog $blog): bool
{
    return $user->role_id === 1;
}

}
