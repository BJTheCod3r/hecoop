<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

/**
 * UserController
 * 
 */
class UserController extends Controller
{

    /**
     * UserController constructor
     * 
     * @param UserRepository $userRepository
     */
    public function __construct(private UserRepository $userRepository)
    {
    }

    /**
     * Fetch users
     * 
     * @return JsonResponse
     */
    public function fetchUsers(): JsonResponse
    {
        return $this->successResponse(UserResource::collection($this->userRepository->all()));
    }
}
