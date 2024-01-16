<?php

namespace App\DTO\User;

use App\Contracts\DTO\DataTransferObjectFactory;

class UserDtoFactory implements DataTransferObjectFactory
{
    public function fromArray(array $data): UserDto
    {
        return new UserDto(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'],
        );
    }
}
