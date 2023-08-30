<?php

include_once('core/arr.php');
include_once('model/articles.php');
include_once('model/categories.php');

$article_id = trim($_GET['id'] ?? '');
$article = getArticle($article_id);
$errors = [];
$categories = getAllCategories();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $params = filter_array_by_keys($_POST, ['category_id', 'title', 'author', 'content']);
    $params['article_id'] = $article_id;
    $errors = validateArticle($params);
    if (empty($errors)) {
        editArticle($article['article_id'], $params);
        header('Location: index.php');
        exit();
    } else {
        remove_duplicate_category($categories, $article['category_id']);
    }
} else {
    remove_duplicate_category($categories, $article['category_id']);
}

include('views/v_edit.php');