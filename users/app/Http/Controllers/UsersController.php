<?php
namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(UserRequest $request)
    {
        $user = $this->userService->createUser($request->validated());

        return response()->json(['user' => $user], 201);
    }
}

