<?php

require "controller/ControladorController.php";
require "controller/CulturaController.php";
require "controller/LeituraController.php";
require "controller/SensorController.php";

$controlador = new ControladorController();
$cultura = new CulturaController();
$leitura = new LeituraController();
$sensor = new SensorController();

function verificaMetodo($metodoCorreto) {
    if (!in_array($_SERVER['REQUEST_METHOD'], $metodoCorreto)) {
        http_response_code(405);
        echo "Método não permitido";
        die();
    }
}

$routes = [
    "/controlador" => function() use ($controlador) {
        verificaMetodo(["GET", "POST"]);

        $_SERVER['REQUEST_METHOD'] == 'GET'
            ? $controlador->index()
            : $controlador->store();
    },
    "/cultura" => function() use ($cultura) {
        verificaMetodo(["GET", "POST"]);

        $_SERVER['REQUEST_METHOD'] == 'GET'
            ? $cultura->index()
            : $cultura->store();
    },
];