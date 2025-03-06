<?php
// Iegūst pašreizējo URL ceļu (path) no pieprasījuma URI
$uri = parse_url($_SERVER["REQUEST_URI"])["path"]; 

// Iekļauj maršrutu definējošo failu (routes.php), kas satur URL maršrutus un atbilstošos failus
$routes = require("routes.php");


// Pieprasām katru kontrolieri, lai visas klases kļūtu pieejamas
foreach ($routes as $controller) {
    // Izdala kontroliera klasi no metodes
    require_once "controllers/" . explode("@", $controller)[0] . ".php";
}

// Pārbauda, vai maršruta ceļš ($uri) pastāv kā atslēga masīvā $routes
if (array_key_exists($uri, $routes)) {
  
  // Izdala kontroliera klasi un metodi no maršruta vērtības
  list($controller, $method) = explode('@', $routes[$uri]);

  // Izveido kontroliera instanci
  $instance = new $controller();

  // Izsauc norādīto metodi
  $instance->$method();
  
} else {
  
  // Ja maršruts neeksistē, tiek atgriezts HTTP atbildes kods 404 (lapas nav atrasta)
  http_response_code(404);
  
  // Lietotājam tiek izvadīta ziņa par to, ka lapa nav atrasta
  echo "Lapa nav atrasta!";
  
  // Pārtrauc tālāku skripta izpildi
  exit();
}
?>
