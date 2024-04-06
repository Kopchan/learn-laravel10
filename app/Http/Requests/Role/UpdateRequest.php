<?php

namespace App\Http\Requests\Role;

use App\Http\Requests\ApiRequest;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|min:3|max:32',
            'code' => 'string|min:3|max:32|unique:roles,code',
        ];
    }
}
