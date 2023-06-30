<?php

namespace App\Services\Auth;

use App\DTO\UserRegistrationDto;
use App\Models\User;
use Illuminate\Support\Str;

final class RegistrationService
{
    public function register(UserRegistrationDto $dto): User
    {
        //TODO проверка на существование email
        $password = Str::random();

        $user = new User();
        $user->email = $dto->email;
        $user->name = $dto->name;
        $user->password = bcrypt($password);
        $user->save();

        return $user;
    }
}
