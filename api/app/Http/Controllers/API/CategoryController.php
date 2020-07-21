<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\GetRecommended;
use App\Services\FoursquareService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class CategoryController extends BaseApiController
{
    /**
     * @var FoursquareService
     */
    private $foursquare;

    public function __construct(FoursquareService $foursquare)
    {
        $this->foursquare = $foursquare;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     *
     * @throws GuzzleException
     */
    public function index(): JsonResponse
    {
        try {
            $categories = $this->foursquare->getCategories();

            $data = [
                'total' => count($categories),
                'items' => $categories,
            ];

            return $this->success($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->error();
        }
    }

    /**
     * Get recommended venues
     *
     * @param GetRecommended $request
     * @return JsonResponse
     *
     * @throws GuzzleException
     */
    public function recommendedVenuesByNear(GetRecommended $request): JsonResponse
    {
        try {
            $near = $request->get('near');
            $category = $request->get('category');

            $recommended = $this->foursquare->getRecommended($near, $category);
            $data = [
                'total' => count($recommended),
                'items' => $recommended,
            ];

            return $this->success($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->error();
        }
    }

}
