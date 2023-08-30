<?php

include_once('model/articles.php');
$article_id = trim($_GET['id'] ?? '');
$article = getArticle($article_id);

include('views/v_article.php');