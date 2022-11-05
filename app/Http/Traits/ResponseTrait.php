<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    /**
     * @param $data
     * @param string $message
     * @param int $status_code
     * @return JsonResponse
     */
    public function successResponse(mixed $data = [], string $message = 'success!', int $status_code = 200): JsonResponse
    {
        return response()->json(['data' => $data, 'message' => $message], $status_code);
    }

    /**
     * @param string $message
     * @param int $status_code
     * @return JsonResponse
     */
    public function errorResponse(string $message = '', int $status_code = 400): JsonResponse
    {
        return response()->json(['message' => $message], $status_code);
    }
}
