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
  case "index":
    $ctrl->index();
    break;
  case "login":
    $ctrl->login();
    break;
  case "passageiro":
    $pass->view();
    break;
  case "passageiro/cadastrar":
    $pass->cadastro();
    break;
  case "passageiro/save":
    $pass->save($_POST);
    break;
  case "pagamento":
    $pagar->view();
    break;
  case "pagamento/save":
    $pagar->pagar($_POST);
    break;
  case "pagamento/cadastrar":
    $pagar->cadastro();
    break;
  case "reserva":
    $reserva->cadastro();
    break;
  case "reserva/save":
    $reserva->save($_POST);
    break;
  case "reserva/view":
    $reserva->view();
    break;
  case "cancelamentos/save":
    $cancelamento->save($_POST);
    break;
  case "cancelamentos/cadastrar":
    $cancelamento->cadastro();
    break;
  case "cancela":
    $cancelamento->view();
    break;
  default:
    $ctrl->index();
    break;
}
