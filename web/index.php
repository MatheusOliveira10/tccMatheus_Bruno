<?php
require "controller/homeController.php";
require "controller/passageiroController.php";
require "controller/pagamentoController.php";
require "controller/reservaController.php";
require "controller/cancelamentoController.php";

$pagina = explode('/', $_SERVER['REQUEST_URI']);
$ctrl = new homeController();
$pass = new passageiroController();
$pagar = new pagamentoController();
$reserva = new reservaController();
$cancelamento = new cancelamentoController();

if (isset($pagina[2])) {
  $page = $pagina[1] . "/" . $pagina[2];
} else {
  $page = $pagina[1];
}

switch ($page) {
  case "teste":
    $ctrl->index();
    break;
  default:
    $ctrl->index();
    break;
}
