<?php
header('Content-Type: application/json');

require __DIR__ . '/vendor/autoload.php';

use Models\Helper;
include "routes.php";

if(!isset($routes[$_SERVER['REQUEST_URI']])) {
  http_response_code(404);
  echo '404';
  die();
}

// Helper::dd();
$routes[$_SERVER['REQUEST_URI']]();
