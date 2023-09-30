<?php

include_once('init.php');

$controllerName = $_GET['c'] ?? 'index';

$pageTitle = "404 Not Found";
$pageContent = "";

$controllerPath = "controllers/$controllerName.php";
if (checkControllerName($controllerName) && file_exists($controllerPath)) {
    include_once($controllerPath);
} else {
    header('HTTP/1.1 404 Not Found');
    $pageContent = template("errors/v_404");
}

$html = template("base/v_main", [
    "title" => $pageTitle,
    "content" => $pageContent,
]);

echo $html;