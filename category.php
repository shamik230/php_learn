<?php

include_once('model/articles.php');
include_once('model/categories.php');
$category_id = trim($_GET['id'] ?? '');
$articles = getArticlesByCategory($category_id);
$categories = getAllCategories();

include('views/v_category.php');