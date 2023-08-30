<header>
  <div>
    <h1>Articles</h1>
    <nav>
      <ul>
        <li><a href="add.php"><b>Add</b></a></li>
        <li><a href="index.php">Index</a></li>
        <?foreach($categories as $category):?>
            <li><a href="category.php?id=<?=$category['category_id']?>"><?=$category['name']?></a></li>
        <?endforeach;?>
      </ul>
    </nav>
  </div>
</header>
<hr>
<?foreach($articles as $article):?>
    <h2><?=$article['title']?></h2>
    <p>[<?=$article['author']?>] /// <?=$article['category_name']?></p>
    <p><i><?=$article['dt_add']?></i> </p>
    <a href="article.php?id=<?=$article['article_id']?>">View</a>
    <hr>
<?endforeach;?>