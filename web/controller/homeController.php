<?php

class homeController{
  public function index(){
    $teste = [
      [
        "porta" => 10,
        "sensor" => "2/humi"
      ]
    ];
    
    echo (json_encode($teste));

    // header("Content-Type: application/json");
    //include "view/index.php";

   // $pdo = new Query();

    //$users = $pdo->select('SELECT * FROM users');

    //echo json_encode($users, JSON_UNESCAPED_UNICODE);
  }
  public function login(){
    include "view/login.php";
  }

}