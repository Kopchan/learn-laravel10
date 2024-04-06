<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiRequest;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'surname'    => 'string|min:2|max:32',
            'name'       => 'string|min:2|max:32',
            'patronymic' => 'string|min:2|max:32',
            'login'      => 'string|min:3|max:32|unique:users,login',
            'password'   => 'string|min:8|max:32',
            'role_id'    => 'integer|exist:roles,id',
        ];
    }
}
