<?php

include_once('core/arr.php');
include_once('model/articles.php');
include_once('model/categories.php');

$params = [];
$errors = [];
$categories = getAllCategories();
$category_name = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $params = filterArrayByKeys($_POST, ['category_id', 'title', 'author', 'content']);
    $errors = validateArticle($params);
    prepareArticleFields($params);
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
        removeDuplicateCategory($categories, $params['category_id']);
    }
} else {
    $params = filterArrayByKeys($_POST, ['category_id', 'title', 'author', 'content']);
}

$pageTitle = "Add";
$pageContent = template("v_add", [
    "params" => $params,
    "category_name" => $category_name,
    "categories" => $categories,
    "errors" => $errors,
]);