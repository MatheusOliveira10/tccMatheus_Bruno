<?php

class homeController{
  public function index(){
    $teste = [
      [
        "sensor" => "2/humi",
        "porta" => 10,
      ],
      [
        "sensor" => "2/temp",
        "porta" => 11,
      ],
    ];

    echo json_encode($teste);
  }
  public function login(){
    include "view/login.php";
  }

}