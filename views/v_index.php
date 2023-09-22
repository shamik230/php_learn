<header>
  <div>
    <h1>Articles</h1>
    <nav>
      <ul>
        <li><a href="index.php?c=add"><b>Add</b></a></li>
        <li><a href="index.php">Index</a></li>
        <?foreach($categories as $category):?>
            <li><a href="index.php?c=category&id=<?=$category['category_id']?>"><?=$category['name']?></a></li>
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
    <a href="index.php?c=article&id=<?=$article['article_id']?>">View</a>
    <hr>
<?endforeach;?>