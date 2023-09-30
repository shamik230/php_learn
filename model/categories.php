<?php

function getAllCategories(){
    $sql = 'SELECT * FROM categories';
    $query = dbQuery($sql);
    return $query->fetchAll();
}

function removeDuplicateCategory(&$categories, $category_id){
    foreach($categories as $key => $value){
        if($value['category_id'] == $category_id){
            unset($categories[$key]);
            break;
        }
    }
}