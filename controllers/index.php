<?php

$articles = getAllArticles();
$categories = getAllCategories();

$pageTitle = "Index";
$pageContent = template("v_index", [
    "articles" => $articles,
    "categories" => $categories,
]);