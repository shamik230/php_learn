<?php

include_once('model/articles.php');
include_once('model/categories.php');

$articles = getAllArticles();
$categories = getAllCategories();

include('views/v_index.php');