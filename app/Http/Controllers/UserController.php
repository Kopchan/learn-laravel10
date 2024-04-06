<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    public function showAll() {
        $users = User::all();
        if (!$users) return response([
            'message' => 'No users',
            'users' => [],
        ]);

        return response([
            'users' => $users,
        ]);
    }
    public function show(int $id) {
        $user = User::find($id);
        if (!$user)
            throw new ApiException(404, 'Users not found');

        return response($user);
    }
    public function create(CreateRequest $request) {
        $user = new User($request->all());
        $user->role_id = Role::where('code', 'user')->first()->id;
        $user->save();

        return response($user, 201);
    }
    public function update(UpdateRequest $request, int $id) {
        $user = User::find($id);
        if (!$user)
            throw new ApiException(404, 'User not found');

        $user->update($request->all());
        return response(null, 204);
    }
    public function delete(int $id) {
        $user = User::find($id);
        if (!$user)
            throw new ApiException(404, 'User not found');

        $user->delete();
        return response(null, 204);
    }
}
