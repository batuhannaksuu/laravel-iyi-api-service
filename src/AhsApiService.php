<?php

namespace App\Services;

use GuzzleHttp\Client;

class AhsApiService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => env('AHS_API_BASE_URL')]);
    }

    public function getBrandListByTin($taxNumber)
    {
        $response = $this->client->get("/api/brands/{$taxNumber}");
        return json_decode($response->getBody(), true);
    }
}
