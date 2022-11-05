<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ResourceRepository;
use App\Http\Requests\UserResourcesRequest;
use Illuminate\Http\JsonResponse;

/**
 * ResourceController
 * 
 */
class ResourceController extends Controller
{

    /**
     * ResourceController constructor
     * 
     * @param ResourceRepository $resourceRepository
     */
    public function __construct(private ResourceRepository $resourceRepository)
    {
    }

    /**
     * Fetch user resources
     * 
     * @param UserResourcesRequest $request
     * @return JsonResponse
     */
    public function fetchUserResources(UserResourcesRequest $request): JsonResponse
    {
        $id = (int) $request->user_id;
        $q = $request->get('q');
        $completed = (bool) $request->get('completed', 0);
        $sort = $request->sort;

        return $this->successResponse($this->resourceRepository->fetchUserResources($id, $q, $completed, $sort));
    }
}
