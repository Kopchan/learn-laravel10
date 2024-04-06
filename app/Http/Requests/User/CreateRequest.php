<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiRequest;

class CreateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'surname'    => 'required|string|min:2|max:32',
            'name'       => 'required|string|min:2|max:32',
            'patronymic' => 'required|string|min:2|max:32',
            'login'      => 'required|string|min:3|max:32|unique:users,login',
            'password'   => 'required|string|min:8|max:32',
            //'role_id'    => 'required|integer|exist:roles,id',
        ];
    }
}
