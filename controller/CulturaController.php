<?php

use PhpMqtt\Client\MqttClient;
use Models\Query;
use Models\Helper;

class CulturaController {
  public function index(){
    $qry = 'SELECT * FROM testes';

    // echo json_encode(["isBrunoGay" => true]);
    echo Query::select($qry);
  }
  
  public function store(){
    $qry = 'SELECT * FROM testes LIMIT 1';

    // echo json_encode(["isBrunoGay" => true]);
    echo Query::select($qry);  }
}