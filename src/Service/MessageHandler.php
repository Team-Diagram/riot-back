<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 *
 */
class MessageHandler
{
    /**
     * @throws TransportExceptionInterface
     */
    public function sendMessage(string $targetNodeId, string $placeId, int $cmdType): void
    {
        $apiMqttUrl = $_ENV['API_MQTT'];
        $httpClient = HttpClient::create();

        $message = [
            'gatewayId' => $placeId,
            'nodeId' => $targetNodeId,
            'cmdType' => $cmdType,
        ];

        $httpClient->request('POST', $apiMqttUrl, [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => json_encode($message),
        ]);
    }
}
