<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BaseApiController extends Controller
{
    /**
     * JSON success response
     *
     * @param array $data
     *
     * @return JsonResponse
     */
    protected function success(array $data)
    {
        $response = [
            'status' => 'success',
            'data' => $data,
        ];

        return response()->json($response);
    }

    /**
     * JSON success response
     **
     * @return JsonResponse
     */
    protected function error()
    {
        $response = [
            'status' => 'error',
            'data' => [],
            'message' => 'There is an error! Please try again.'
        ];

        return response()->json($response, 500);
    }
}
