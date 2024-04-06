<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\ApiRequest;

class LoginRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'login'    => 'required|string|min:3|max:32',
            'password' => 'required|string|min:8|max:32',
        ];
    }
}
