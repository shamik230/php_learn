<?php

include_once('model/articles.php');
$article_id = trim($_GET['id'] ?? '');
$article = getArticle($article_id);

if(!empty($article)){
    $pageTitle = $article["title"];
    $pageContent = template("v_article", [
        "article" => $article,
    ]);
} else {
    header('HTTP/1.1 404 Not Found');
    $pageContent = template("errors/v_404");
}