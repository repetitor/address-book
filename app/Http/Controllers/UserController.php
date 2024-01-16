<?php

namespace App\Http\Controllers;

use App\DTO\User\UserDtoFactory;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {

    }

    public function store(RegisterRequest $request, UserDtoFactory $factory): \Illuminate\Http\Response
    {
        $userDto = $factory->fromArray($request->validated());
        $this->userService->store($userDto);

        return response()->noContent();
    }

    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        return response()->json([
            'auth_token' => $this->userService->generateToken($user),
        ]);
    }
}
