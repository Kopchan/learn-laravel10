<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showAll() {
        $categories = Category::all();
        if (!$categories) return response([
            'message' => 'No categories',
            'categories' => [],
        ]);

        return response([
            'categories' => $categories,
        ]);
    }
    public function show(int $id) {
        $category = Category::find($id);
        if (!$category)
            throw new ApiException(404, 'Category not found');

        return response($category);
    }
    public function create(CreateRequest $request) {
        $category = Category::create($request->all());
        return response($category, 201);
    }
    public function update(UpdateRequest $request, int $id) {
        $category = Category::find($id);
        if (!$category)
            throw new ApiException(404, 'Category not found');

        $category->update($request->all());
        return response(null, 204);
    }
    public function delete(int $id) {
        $category = Category::find($id);
        if (!$category)
            throw new ApiException(404, 'Category not found');

        $category->delete();
        return response(null, 204);
    }
}
