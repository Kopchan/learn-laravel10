<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\ApiRequest;

class CreateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name'        => 'required|string|min:3|max:64',
            'price'       => 'required|decimal:0,2',
            'photo'       => 'required|file|mimes:bmp,jpg,jpeg,png,gif',
            'category_id' => 'required|integer|exists:categories,id'
        ];
    }
}
