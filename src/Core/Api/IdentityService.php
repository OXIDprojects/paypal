<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidSolutionCatalysts\PayPal\Core\Api;

use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use OxidSolutionCatalysts\PayPalApi\Exception\ApiException;
use OxidSolutionCatalysts\PayPalApi\Service\BaseService;
use Psr\Http\Message\ResponseInterface;
use OxidSolutionCatalysts\PayPal\Core\Config;

class IdentityService extends BaseService
{
    /**
     * PayPal client token is valid for 24 hours
     * https://developer.paypal.com/braintree/docs/guides/authorization/client-token
     */
    private const TOKEN_LIFETIME_SECONDS = 24 * 3600;

    /** @var Config */
    private $config;

    public function __construct($client)
    {
        parent::__construct($client);
        $this->config = oxNew(Config::class);
    }

    /**
     * @throws ApiException
     * @throws JsonException|GuzzleException
     */
    public function requestClientToken(): string
    {
        $cachedToken = $this->getCachedToken();
        if ($cachedToken) {
            return $cachedToken;
        }

        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers = array_merge($headers, $this->getAuthHeaders());

        $path = '/v1/identity/generate-token';

        /** @var ResponseInterface $response */
        $response = $this->send('POST', $path, [], $headers);
        $body = $response->getBody();

        $result = json_decode((string)$body, true, 512, JSON_THROW_ON_ERROR);

        if (isset($result['client_token'])) {
            $this->cacheToken($result['client_token']);
            return $result['client_token'];
        }

        return '';
    }

    /**
     * @return string|null
     * @throws JsonException
     */
    private function getCachedToken(): ?string
    {
        $cacheFile = $this->config->getDataClientTokenCacheFileName();

        if (!file_exists($cacheFile)) {
            return null;
        }

        $cachedData = json_decode(file_get_contents($cacheFile), true, 512, JSON_THROW_ON_ERROR);

        if (!isset($cachedData['timestamp']) || !isset($cachedData['token'])) {
            return null;
        }

        // Check if token is too old
        if (time() - $cachedData['timestamp'] > self::TOKEN_LIFETIME_SECONDS) {
            unlink($cacheFile);
            return null;
        }

        return $cachedData['token'];
    }

    /**
     * @param string $token
     * @return void
     * @throws JsonException
     */
    private function cacheToken(string $token): void
    {
        $cacheData = [
            'timestamp' => time(),
            'token' => $token
        ];

        file_put_contents(
            $this->config->getDataClientTokenCacheFileName(),
            json_encode($cacheData, JSON_THROW_ON_ERROR)
        );
    }

    /**
     * @return array
     * @throws JsonException
     * @throws GuzzleException
     */
    protected function getAuthHeaders(): array
    {
        if (!$this->client->isAuthenticated()) {
            $this->client->auth();
        }

        $headers = [];
        $headers['Authorization'] = 'Bearer ' . $this->client->getTokenResponse();

        return $headers;
    }
}
