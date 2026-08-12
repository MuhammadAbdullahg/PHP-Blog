<?php require __DIR__ . '/../header.php' ?>
<form method="post">
    <button type="submit" name="addPost" value="addPost">
        <a href="<?= $commonPath ?>addPost">Add Post</a>
    </button>
</form>
<?php require __DIR__ . '/postsData.view.php' ?>
<?php require __DIR__ . '/../footer.php' ?>