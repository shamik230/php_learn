<?php

function checkControllerName(string $name) : bool{
    return !!preg_match('/^[aA-zZ0-9_-]+$/', $name);
}

function template(string $path, $vars = []) : string {
    $fullPath = "views/$path.php";
    extract($vars);
    ob_start();
    include($fullPath);
    return ob_get_clean();
}