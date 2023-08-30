<?php

include_once('core/db.php');

function getAllArticles(){
    $db_name = 'hw4';
    $sql = 'SELECT articles.*, categories.name as category_name FROM articles JOIN categories USING (category_id) ORDER BY dt_add DESC';
    $query = dbQuery($db_name, $sql);
    return $query->fetchAll();
}

function addArticle($params){
    $db_name = 'hw4';
    $sql = 'INSERT INTO articles (category_id, title, author, content) VALUES (:category_id, :title, :author, :content)';
    $query = dbQuery($db_name, $sql, $params);
    return true;
}

function editArticle($article_id, $params){
    $db_name = 'hw4';
    $sql = 'UPDATE articles SET category_id=:category_id, title=:title, author=:author, content=:content WHERE article_id=:article_id';
    $query = dbQuery($db_name, $sql, $params);
    return true;
}

function getArticlesByCategory($category_id){
    $db_name = 'hw4';
    $sql = 'SELECT articles.*, categories.name as category_name FROM articles JOIN categories USING (category_id) WHERE category_id=:category_id ORDER BY dt_add DESC';
    $query = dbQuery($db_name, $sql, ['category_id' => $category_id]);
    return $query->fetchAll();
}

function getArticle($article_id){
    $db_name = 'hw4';
    $sql = 'SELECT articles.*, categories.name as category_name FROM articles JOIN categories USING (category_id) WHERE article_id=:article_id ORDER BY dt_add DESC';
    $query = dbQuery($db_name, $sql, ['article_id' => $article_id]);
    return $query->fetch();
}

function validateArticle($params){
    $errors = [];

    if($params['category_id'] === ''){
        $errors[] = 'Выберите категорию!';
    }
    
    if(mb_strlen($params['author'], 'UTF-8') < 2){
        $errors[] = 'Имя автора от 2 символов!';
    }

    if(mb_strlen($params['title'], 'UTF-8') < 5){
        $errors[] = 'Название статьи от 5 символов!';
    }

    if(mb_strlen($params['content'], 'UTF-8') < 10){
        $errors[] = 'Контент статьи от 10 символов!';
    }

    return $errors;
}