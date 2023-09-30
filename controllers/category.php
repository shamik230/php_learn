<?php

$category_id = trim($_GET['id'] ?? '');
$articles = getArticlesByCategory($category_id);
$categories = getAllCategories();

$pageTitle = "";
foreach($categories as $category){
    if($category["category_id"] == $category_id) {
        $pageTitle = $category["name"];
        break;
    }
}
$pageContent = template("v_index", [
    "articles" => $articles,
    "categories" => $categories,
]);