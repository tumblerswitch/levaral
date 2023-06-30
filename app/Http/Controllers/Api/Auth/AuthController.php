<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Services\Auth\AuthService;
use App\Services\Auth\RegistrationService;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    private AuthService $authService;
    private RegistrationService $registrationService;

    public function __construct(AuthService $authService, RegistrationService $registrationService)
    {
        $this->authService = $authService;
        $this->registrationService = $registrationService;
    }

    public function register(RegistrationRequest $request): Response
    {
        $user = $this->registrationService->register($request->getDTO());

        return response()->json($user);
    }

    public function login(LoginRequest $request): Response
    {
        $credentials = $request->only('email', 'password');

        $token = $this->authService->login($credentials);

        return response()->json(
            [
                'token' => $token,
                'type' => 'bearer',
            ]
        );
    }

    public function logout(): Response
    {
        $this->authService->logout(Auth::user());

        return response()->noContent();
    }

    public function logoutFromAllDevices(): Response
    {
        $this->authService->logoutFromAllDevices(Auth::user());

        return response()->noContent();
    }
}
