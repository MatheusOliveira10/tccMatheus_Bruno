<?php

use PhpMqtt\Client\MqttClient;

class homeController{
  public function index(){
    $server   = 'test.mosquitto.org';
    $port     = 1883;
    $clientId = 'mobg';

    try {
      // Create a new instance of an MQTT client and configure it to use the shared broker host and port.
      $client = new MqttClient($server, $port, 'mobg/teste', MqttClient::MQTT_3_1, null);
  
      // Connect to the broker without specific connection settings but with a clean session.
      $client->connect(null, true);
  
      // Subscribe to the topic 'foo/bar/baz' using QoS 2.
      $client->subscribe('mobg/teste', function (string $topic, string $message, bool $retained) use ($client) {
         echo('topic =' . $topic);
         echo('message =' . $message);
         echo('typeOfMessage' . $retained ? 'retained message' : 'message');
  
          // After receiving the first message on the subscribed topic, we want the client to stop listening for messages.
          $client->interrupt();
      }, MqttClient::QOS_EXACTLY_ONCE);
  
      // Since subscribing requires to wait for messages, we need to start the client loop which takes care of receiving,
      // parsing and delivering messages to the registered callbacks. The loop will run indefinitely, until a message
      // is received, which will interrupt the loop.
      $client->loop(true);
  
      // Gracefully terminate the connection to the broker.
      $client->disconnect();
  } catch (MqttClientException $e) {
      // MqttClientException is the base exception of all exceptions in the library. Catching it will catch all MQTT related exceptions.
      $logger->error('Subscribing to a topic using QoS 2 failed. An exception occurred.', ['exception' => $e]);
  }
  }
  
  public function login(){
    include "view/login.php";
  }
}