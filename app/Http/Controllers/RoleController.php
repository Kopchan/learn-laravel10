<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\Role\CreateRequest;
use App\Http\Requests\Role\UpdateRequest;
use App\Models\Role;

class RoleController extends Controller
{
    public function showAll() {
        $roles = Role::all();
        if (!$roles) return response([
            'message' => 'No roles',
            'roles' => [],
        ]);

        return response([
            'roles' => $roles,
        ]);
    }
    public function show(int $id) {
        $role = Role::find($id);
        if (!$role)
            throw new ApiException(404, 'Roles not found');

        return response($role);
    }
    public function create(CreateRequest $request) {
        $role = Role::create($request->all());
        return response($role, 201);
    }
    public function update(UpdateRequest $request, int $id) {
        $role = Role::find($id);
        if (!$role)
            throw new ApiException(404, 'Role not found');

        $role->update($request->all());
        return response(null, 204);
    }
    public function delete(int $id) {
        $role = Role::find($id);
        if (!$role)
            throw new ApiException(404, 'Role not found');

        $role->delete();
        return response(null, 204);
    }
}
