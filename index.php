<?php
header('Content-Type: application/json');

require __DIR__ . '/vendor/autoload.php';

include "routes.php";
include "helpers.php";

if(!isset($routes[$_SERVER['REQUEST_URI']])) {
  http_response_code(404);
  echo '404';
  die();
}

$routes[$_SERVER['REQUEST_URI']]();
