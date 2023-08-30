<style>
    pre {
        font-family: "Times New Roman", Times, serif;
        font-size: 20px;
    }
</style>

<a href="index.php">Back to Index</a>
<hr>
<h2><?=$article['title']?></h2>
<pre><?=$article['content']?></pre>
<p>Author: <?=$article['author']?> /// Category: <?=$article['category_name']?></p>
<p><i><?=$article['dt_add']?></i> </p>
<a href="edit.php?id=<?=$article['article_id']?>">Edit</a>