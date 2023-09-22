<style>
    pre {
        font-family: "Times New Roman", Times, serif;
        font-size: 20px;
    }
</style>

<a href="index.php?c=article&id=<?=$article['article_id']?>">Back to Article</a>
<hr>    
<form method="post">
    <label for="cat">Category</label>
    <select name="category_id" id="cat">
        <option value="<?=$article['category_id']?>" selected><?=$article['category_name']?></option>
        <?foreach($categories as $category):?>
        <option value="<?=$category['category_id']?>"><?=$category['name']?></option>
        <?endforeach;?>
    </select><br>
    Author<br><input type="text" name="author" value="<?=$article['author']?>"><br>
    Title<br><input type="text" name="title" value="<?=$article['title']?>"><br>
    Content<br><textarea name="content" ><?=$article['content']?></textarea><br>
    <button>Send</button>
</form>

<?foreach($errors as $err):?>
    <p><?=$err?></p>
<?endforeach;?>