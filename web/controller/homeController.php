<?php

use PhpMqtt\Client\MqttClient;

class homeController{
  public function index(){
    echo json_encode(["isBrunoGay" => true]);
  }
  
  public function login(){
    include "view/login.php";
  }
}