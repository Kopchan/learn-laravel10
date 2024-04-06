<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\ApiRequest;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name'        => 'string|min:3|max:64',
            'price'       => 'decimal:0,2',
            'photo'       => 'file|mimes:bmp,jpg,jpeg,png,gif',
            'category_id' => 'integer|exists:categories,id'
        ];
    }
}
