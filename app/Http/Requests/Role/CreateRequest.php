<?php

namespace App\Http\Requests\Role;

use App\Http\Requests\ApiRequest;

class CreateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:32',
            'code' => 'required|string|min:3|max:32|unique:roles,code',
        ];
    }
}
