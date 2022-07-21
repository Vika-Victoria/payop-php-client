<?php

declare(strict_types=1);

namespace PayopClient;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use PayopClient\Http\HttpConnector;
use PayopClient\Http\PayopClient;

class ClientFactory implements PayopClientFactoryInterface
{
    private const DOMAIN = 'https://payop.com';

    public function __construct(
        private HandlerStack $handlerStack
    ) {
    }

    public function make(string $token): PayopClient
    {
        $guzzleClient = new Client([
            'base_uri' => self::DOMAIN,
            'handler' => $this->handlerStack,
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
            ]
        ]);

        return new PayopClient(
            new HttpConnector($guzzleClient)
        );
    }
}
