<?php

namespace App\DTO;

class UserRegistrationDto
{
    public string $email;
    public string $name;

    public function __construct(array $attributes)
    {
        $this->email = $attributes['email'];
        $this->name = $attributes['name'];
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
