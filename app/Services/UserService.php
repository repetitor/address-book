<?php

namespace App\Services;

use App\DTO\User\UserDto;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function store(UserDto $userDto): User
    {
        return User::create([
            'name' => $userDto->name,
            'email' => $userDto->email,
            'password' => Hash::make($userDto->password),
        ]);
    }

    public function generateToken(User $user): string
    {
        return $user->createToken(name: 'auth_token')->plainTextToken;
    }
}
