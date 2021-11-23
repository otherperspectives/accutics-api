<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService
{

    /**
     * Send a request to any service
     * @param $method
     * @param $requestUrl
     * @param $formParams
     * @param $headers
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function performRequest($method, $requestUrl, $params = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri
        ]);

        $response = $client->request($method, $requestUrl, [ 'form_params' => $params,
            'headers' => $headers]);

        return $response->getBody()->getContents();
    }
}
