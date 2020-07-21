<?php

namespace App\Services\API;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class FoursquareApi implements IApi
{
    CONST API_VERSION = 'v2';

    /** @var Client $client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;

    }

    /**
     * Get Foursquare categories
     *
     * @return string
     * @return string
     *s
     * @throws GuzzleException
     *
     */
    public function getCategories(): string
    {
        try {
            $response = $this->client->get(
                sprintf('%s/venues/categories', self::API_VERSION),
                [
                    'query' => $this->prepareQueryParams([]),
                ]
            );

            return $response->getBody()->getContents();
        } catch (\Exception $e) {
            throw new \Exception('There is an error. Please try again.');
        }

    }

    /**
     * @param string $near
     * @param string $category
     *
     * @return string
     *
     * @throws GuzzleException
     */
    public function getRecommendedVenuesByNear(string $near, string $category): string
    {
        try {
            $params = [
                'near' => $near,
                'query' => $category,
            ];

            $response = $this->client->get(
                sprintf('%s/venues/explore', self::API_VERSION),
                [
                    'query' => $this->prepareQueryParams($params),
                ]
            );

            return $response->getBody()->getContents();
        } catch (\Exception $e) {
            throw new \Exception('There is an error. Please try again.');
        }
    }

    /**
     * @param array $params
     *
     * @return array
     */
    private function prepareQueryParams(array $params)
    {
        $defaultParams = [
            'client_id' => \config()->get('foursquare.client_id'),
            'client_secret' => \config()->get('foursquare.client_secret'),
            'v' => date('Ymd'),
        ];

        return array_merge($params, $defaultParams);
    }
}
