<?php

namespace App\Services;

use App\Services\API\FoursquareApi;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class FoursquareService
{
    /** @var FoursquareApi $api */
    private $api;

    /**
     * FoursquareService constructor.
     *
     * @param FoursquareApi $api
     */
    public function __construct(FoursquareApi $api)
    {
        $this->api = $api;
    }

    /**
     *  Get categories
     *
     * @return mixed
     *
     * @throws GuzzleException
     */
    public function getCategories(): array
    {
        try {
            $data = $this->api->getCategories();
            $jsonData = \json_decode($data, false);

            return $jsonData->response->categories;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Get Recommended venues
     *
     * @param string $keyword
     * @param string $category
     *
     * @return array
     *
     * @throws GuzzleException
     */
    public function getRecommended(string $keyword, string $category): array
    {
        try {
            $venues = [];
            $data = $this->api->getRecommendedVenuesByNear($keyword, $category);
            $jsonData = \json_decode($data, false);

            foreach ($jsonData->response->groups[0]->items as $item) {
                $venues[] = $item->venue;
            }

            return $venues;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
