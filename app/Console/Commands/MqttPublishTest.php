<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;

class MqttPublishTest extends Command
{
    protected $signature = 'mqtt:publish';
    protected $description = 'Publica mensagem MQTT de teste';

    public function handle()
    {
        $client = new MqttClient(
            'broker.hivemq.com',
            1883,
            'laravel-smarthome-' . rand()
        );

        $settings = (new ConnectionSettings)
            ->setKeepAliveInterval(60);

        $client->connect($settings, true);

        $client->publish('smarthome/sala/luz', 'on', 0);

        $client->disconnect();

        $this->info('Mensagem MQTT enviada com sucesso!');
    }
}
