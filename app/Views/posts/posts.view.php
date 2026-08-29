<?php
require __DIR__ . '/../../../autoload.php';

use App\Config\AppConfig;

$commonPath = AppConfig::getCommonPath();
?>
<?php require __DIR__ . '/../header.php' ?>
<form method="post">
<div style="width: 95vw; display: flex; align-items: center; justify-content: end;">
    <button type="submit" name="allPosts" value="allPosts">
        <a href="<?= $commonPath ?>addPost" style="color: #fff; margin-right:  1rem;">Add Post</a>
    </button>
</div>
</form>
<?php require __DIR__ . '/postsData.view.php' ?>
<?php require __DIR__ . '/../footer.php' ?>