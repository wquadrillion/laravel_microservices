<?php

namespace App\Services;

use App\Models\User;
use App\Events\UserCreated;

class UserService
{
    public function createUser(array $data): User
    {
        $user = User::create($data);

        // Dispatch UserCreated event
        event(new UserCreated($user));

        return $user;
    }
}
