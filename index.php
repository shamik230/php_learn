<?php

include_once("core/system.php");

function httpNotFound(){
    header('HTTP/1.1 404 Not Found');
    include('views/errors/v_404.php');
    exit();
}

// $controllerName = $_GET['c'] ?? 'index';

// if(!checkControllerName($controllerName)) {
//     httpNotFound();
// }

// $controllerPath = "controllers/$controllerName.php";

// if(!file_exists($controllerPath)){
//     httpNotFound();
// }

// include_once($controllerPath);

$html = template("base/v_main");