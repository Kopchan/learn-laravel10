<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(LoginRequest $request) {
        if (!Auth::attempt($request->all()))
            throw new ApiException(401, 'Authorization failed');

        $user = Auth::user();
        $user->token = Hash::make(Str::random() . $user->login);
        $user->save();

        return response(['token' => $user->token]);
    }
    public function logout() {
        $user = request()->user();
        $user->token = null;
        $user->save();

        return response(null, 204);
    }
}
