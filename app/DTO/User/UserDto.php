<?php

namespace App\DTO\User;

use App\Contracts\DTO\DataTransferObject;

final readonly class UserDto implements DataTransferObject
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {

    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
