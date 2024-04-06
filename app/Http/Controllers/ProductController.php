<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function showAll() {
        $products = Product::all();
        if (!$products) return response([
            'message' => 'No products',
            'products' => [],
        ]);

        return response([
            'products' => $products,
        ]);
    }
    public function show(int $id) {
        $product = Product::find($id);
        if (!$product)
            throw new ApiException(404, 'Products not found');

        return response($product);
    }
    public function create(CreateRequest $request) {
        $product = Product::create($request->all());
        return response($product, 201);
    }
    public function update(UpdateRequest $request, int $id) {
        $product = Product::find($id);
        if (!$product)
            throw new ApiException(404, 'Product not found');

        $product->update($request->all());
        return response(null, 204);
    }
    public function delete(int $id) {
        $product = Product::find($id);
        if (!$product)
            throw new ApiException(404, 'Product not found');

        $product->delete();
        return response(null, 204);
    }
}
