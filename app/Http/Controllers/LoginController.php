<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Http\Resources\UserResource;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;

/**
 * LoginController
 * 
 */
class LoginController extends Controller
{

    /**
     * LoginController constructor
     * 
     * @param UserRepository $userRepository
     */
    public function __construct(private UserRepository $userRepository)
    {
    }

    /**
     * Login user
     * 
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $user = $this->userRepository->findOneBy('email', $request->email);

        $token = $user->createToken($request->device_name ?? "unknown")->plainTextToken;

        return $this->successResponse([
            'user' => new UserResource($user),
            'access_token' => $token
        ]);
    }

    /**
     * Revoke user's token
     * 
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        try {
            auth()->user()->tokens()->where('last_used_at', date('Y-m-d h:i:s'))->delete();
        } catch (\Throwable $throwable) {
            return $this->errorResponse($throwable->getMessage());
        }

        return $this->successResponse();
    }
}
