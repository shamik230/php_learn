<?php

$article_id = trim($_GET['id'] ?? '');
$article = getArticle($article_id);
if (empty($article)) {
    header('HTTP/1.1 404 Not Found');
    $pageContent = template("errors/v_404");
    exit();
}

$errors = [];
$categories = getAllCategories();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $params = filterArrayByKeys($_POST, ['category_id', 'title', 'author', 'content']);
    prepareArticleFields($params);
    $params['article_id'] = $article_id;
    $errors = validateArticle($params);
    if (empty($errors)) {
        editArticle($article['article_id'], $params);
        header('Location: index.php');
        exit();
    } else {
        removeDuplicateCategory($categories, $article['category_id']);
    }
} else {
    removeDuplicateCategory($categories, $article['category_id']);
}

$pageTitle = $article['title'];
$pageContent = template("v_edit", [
    "article" => $article,
    "categories" => $categories,
    "errors" => $errors,
]);