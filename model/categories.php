<?php

include_once('core/db.php');

function getAllCategories(){
    $db_name = 'hw4';
    $sql = 'SELECT * FROM categories';
    $query = dbQuery($db_name, $sql);
    return $query->fetchAll();
}

function remove_duplicate_category(&$categories, $category_id){
    foreach($categories as $key => $value){
        if($value['category_id'] == $category_id){
            unset($categories[$key]);
            break;
        }
    }
}