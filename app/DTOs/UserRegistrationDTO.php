<?php

declare(strict_types=1);

namespace App\DTOs;


final readonly class UserRegistrationDTO
{
    public function __construct(
        public string $email,
        public string $password,
        public string $gender,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            email: $data['email'],
            password: $data['password'],
            gender: $data['gender'],
        );
    }
}