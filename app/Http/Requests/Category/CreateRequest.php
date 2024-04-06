<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\ApiRequest;

class CreateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max|32'
        ];
    }
}
