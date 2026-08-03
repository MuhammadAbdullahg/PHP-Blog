<?php require __DIR__ . '/../header.php' ?>
<form method="post">
    <nav>
        <ul>
          <button type="submit" name="category" value="Tech">
            Tech
          </button>
          <button type="submit" name="category" value="Science">Science</button>
          <button type="submit" name="category" value="Food">Food</button>
          <button type="submit" name="category" value="Other">Other</button>
        </ul>
      </nav>
</form>
<?php require __DIR__ . '/posts.view.php' ?>
<?php require __DIR__ . '/../footer.php' ?>