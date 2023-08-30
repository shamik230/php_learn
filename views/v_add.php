<a href="index.php">Back to Index</a>
<hr>
<form method="post">
    <label for="cat">Category</label>
    <select name="category_id" id="cat">
        <?if($category_name !== ''):?>
            <option value="<?=$params['category_id']?>" selected ><?=$category_name?></option>
        <?else:?>
            <option value="" selected disabled hidden>Choose an option</option>
        <?endif;?>
        <?foreach($categories as $category):?>
        <option value="<?=$category['category_id']?>"><?=$category['name']?></option>
        <?endforeach;?>
    </select><br>
    Author<br><input type="text" name="author" value="<?=$params['author']?>"><br>
    Title<br><input type="text" name="title" value="<?=$params['title']?>"><br>
    Content<br><textarea name="content" ><?=$params['content']?></textarea><br>
    <button>Send</button>
</form>

<?foreach($errors as $err):?>
    <p><?=$err?></p>
<?endforeach;?>