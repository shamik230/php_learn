<?php

include_once('model/articles.php');
$article_id = trim($_GET['id'] ?? '');
$article = getArticle($article_id);

if(!empty($article)){
    include('views/v_article.php');
} else {
    header('HTTP/1.1 404 Not Found');
    include('views/errors/v_404.php');
}