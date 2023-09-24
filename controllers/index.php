<?php

include_once('model/articles.php');
include_once('model/categories.php');

$articles = getAllArticles();
$categories = getAllCategories();

$pageTitle = "Index";
$pageContent = template("v_index", [
    "articles" => $articles,
    "categories" => $categories,
]);