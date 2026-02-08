<?php

namespace App\Services;

use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;

class MqttService
{
    private $client;

    public function __construct()
    {
        $this->client = new MqttClient(
            'broker.hivemq.com',
            1883,
            'laravel-smarthome-' . rand()
        );

        $settings = (new ConnectionSettings)
            ->setKeepAliveInterval(60);

        $this->client->connect($settings, true);
    }

    public function publish($topic, $message)
    {
        $this->client->publish(
            $topic,
            json_encode($message),
            0
        );

        $this->client->disconnect();
    }
}
