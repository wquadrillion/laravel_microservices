<?php
namespace App\Domains\UserManagement\Repositories;

use App\Domains\UserManagement\Entities\User;

class UserRepository
{
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function createUser(array $data): User
    {
        return User::create($data);
    }

    // Other methods for CRUD operations
}