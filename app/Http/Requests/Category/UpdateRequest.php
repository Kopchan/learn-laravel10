<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\ApiRequest;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|min:3|max|32'
        ];
    }
}
