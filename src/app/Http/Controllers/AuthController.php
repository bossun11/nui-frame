<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function register(RegisterRequest $request)
    {
        $registerData = $request->validated();
        $user = $this->user->createUser($registerData);
        return response()->json($user, Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request)
    {
        $loginData = $request->validated();
        if (Auth::attempt($loginData)) {
            $user = $this->user->loginUser($loginData);
            $token = $user->generateAuthToken();
            $authResponse = array_merge($user->toArray(), ['token' => $token]);
            return ["status" => 200, "user" => $authResponse, "message" => "ログインに成功しました"];
            // return response()->json(['token' => $token, 'user' => $user], Response::HTTP_OK);
        }

        return response()->json('認証に失敗しました', Response::HTTP_UNAUTHORIZED);
    }
}
