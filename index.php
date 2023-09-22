<?php

$controllerName = $_GET['c'] ?? 'index';
$controllerPath = "controllers/$controllerName.php";
include_once($controllerPath);