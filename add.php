<?php

include_once('core/arr.php');
include_once('model/articles.php');
include_once('model/categories.php');

$params = [];
$errors = [];
$categories = getAllCategories();
$category_name = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $params = filter_array_by_keys($_POST, ['category_id', 'title', 'author', 'content']);
    $errors = validateArticle($params);
    if (empty($errors)) {
        addArticle($params);
        header('Location: index.php');
        exit();
    } else {
        foreach($categories as $category){
            if($category['category_id'] == $params['category_id']) {
                $category_name = $category['name'];
            }
        }
        remove_duplicate_category($categories, $params['category_id']);
    }
} else {
    $params = filter_array_by_keys($_POST, ['category_id', 'title', 'author', 'content']);
}

include('views/v_add.php');