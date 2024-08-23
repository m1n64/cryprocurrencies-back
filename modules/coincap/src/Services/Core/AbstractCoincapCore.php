<?php
declare(strict_types=1);

namespace Modules\Coincap\Services\Core;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

abstract class AbstractCoincapCore
{
    /**
     *
     */
    const string API_URL = 'https://api.coincap.io/v2';

    /**
     * @var PendingRequest
     */
    protected PendingRequest $client;

    /**
     *
     */
    public function __construct()
    {
        $this->client = Http::baseUrl(self::API_URL)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]);
    }

    /**
     * @param string $path
     * @param string $method
     * @param array $data
     * @return array
     */
    public function request(string $path, string $method = 'GET', array $data = []): array
    {
        return $this->client->{$method}($path, $data)->json();
    }
}
