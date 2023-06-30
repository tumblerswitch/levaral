<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

final class AuthService
{
    public const TOKEN_NAME = 'auth_token';

    public function login(array $attributes): string
    {
        if (!Auth::attempt($attributes)) {
            throw new HttpException(Response::HTTP_UNAUTHORIZED, 'Unauthenticated');
        }

        return Auth::user()->createToken(self::TOKEN_NAME)->plainTextToken;
    }

    public function logout(User $user): void
    {
        $user->currentAccessToken()->delete();
    }

    public function logoutFromAllDevices(User $user): void
    {
        $user->tokens()->delete();
    }
}
