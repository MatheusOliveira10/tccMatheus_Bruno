<?php

use Models\Query;

class CulturaController {
  public function index(){
    $qry = 'SELECT * FROM controladores';

    // echo json_encode(["isBrunoGay" => false]);
    echo Query::select($qry);
  }
  
  public function store(){
    $qry = 'SELECT * FROM testes LIMIT 1';

    // echo json_encode(["isBrunoGay" => true]);
    echo Query::select($qry);  }
}