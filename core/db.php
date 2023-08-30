<?php

function dbInstance($db_name){
    static $id;

    if($id === null){
        $db = new PDO("mysql:host=localhost;dbname=$db_name", 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        $db->exec('SET NAMES UTF8');
    }
    
    return $db;
}

function dbQuery($db_name, $sql, $params = []){
    $db = dbInstance($db_name);
    $query = $db->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
    return $query;
}

function dbCheckError($query) {
    $errInfo = $query->errorInfo();
    if($errInfo[0] !== PDO::ERR_NONE){
        echo 'ERROR:' . $errInfo[2];
        exit();
    }
    return true;
}