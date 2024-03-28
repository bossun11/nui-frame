<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Response;

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
}
