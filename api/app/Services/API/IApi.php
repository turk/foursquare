<?php

namespace App\Services\API;

interface IApi
{
    /**
     * Get categories
     *
     * @return string
     */
    public function getCategories(): string;


    /**
     * Get recommended venues
     *
     * @param string $near
     * @param string $category
     *
     * @return string
     */
    public function getRecommendedVenuesByNear(string $near, string $category): string;
}
