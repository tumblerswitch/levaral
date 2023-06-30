<?php

namespace App\Http\Requests\Auth;

use App\DTO\UserRegistrationDto;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|string|email|unique:users',
            'name' => 'required|string'
        ];
    }

    public function getDTO(): UserRegistrationDto
    {
        return new UserRegistrationDto(
            $this->only(
                'email',
                'name'
            )
        );
    }
}
