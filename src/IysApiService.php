<?php

namespace App\Services;

use GuzzleHttp\Client;

class IysApiService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => env('IYS_API_BASE_URL')]);
    }

    public function sendConsent($iysCode, $brandCode, $recipientDetails)
    {
        $response = $this->client->post("/api/consents", [
            'json' => [
                'iysCode' => $iysCode,
                'brandCode' => $brandCode,
                'recipient' => $recipientDetails,
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}
