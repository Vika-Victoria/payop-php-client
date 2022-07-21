<?php

declare(strict_types=1);

namespace PayopClient\Http;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use PayopClient\Exceptions\InvalidApiResponseException;

class HttpConnector
{
    private const API_VERSION = 'v1';

    public function __construct(
        private Client $guzzleClient
    ) {
    }

    public function get(string $route, array $query = []): array
    {
        $query = http_build_query($query);
        if ($query !== null) {
            $route .= '?' . $query;
        }

        $response = $this->guzzleClient->get(self::API_VERSION . $route);

        return $this->decodeResponse($response);
    }

    public function post(string $route, array $formData): array
    {
        $response = $this->guzzleClient->post(self::API_VERSION . $route, [
            'json' => $formData
        ]);

        return $this->decodeResponse($response);
    }

    public function put(string $route, array $formData): array
    {
        $response = $this->guzzleClient->put(self::API_VERSION . $route, [
            'json' => $formData
        ]);

        return $this->decodeResponse($response);
    }

    private function decodeResponse(ResponseInterface $response): array
    {
        $rawResponse = (string)$response->getBody();
        if ($rawResponse == '' || $rawResponse == null) {
            return [];
        }

        $data = json_decode($rawResponse, true);
        if (json_last_error() !== JSON_ERROR_NONE || is_string($data)) {
            throw new InvalidApiResponseException();
        }

        if ($data == null) {
            return [];
        }

        return $data;
    }
}
