<?php require __DIR__ . '/../header.php' ?>
<form method="post">
    <!-- <input type="hidden" name="Science" value="Science">
    <input type="hidden" name="Food" value="Food">
    <input type="hidden" name="Other" value="Other"> -->
    <nav>
        <ul>
            <!-- <input type="hidden" name="Tech" value="Tech"> -->
          <button type="submit" name="category" value="Tech">
            Tech
          </button>
          <button type="submit" name="category" value="Science">Science</button>
          <button type="submit" name="category" value="Food">Food</button>
          <button type="submit" name="category" value="Other">Other</button>
        </ul>
      </nav>
</form>
<?php if(isset($_SESSION['user_id'])) : ?>
    <?php if(!empty($posts)) : ?>
          <div>
            <?php foreach($posts as $post) : ?>
              <div class="h-card" style="display: flex; align-items: center; justify-content: space-between;">
              <div class="card_content">
                <h2><?= $post['title'] ?></h2>
                <p>
                  <?= $post['content'] ?>
                </p>
                <div class="status">
                  <p><?= $post['created_at'] ?></p>
                  <a href="/PHP-blog/public/post?id=<?= $post['id'] ?>"><button class="read-btn">Read More</button></a>
                </div>
              </div>
                <img src="<?= $post['image_path'] ?>" alt="laptop guy" />
              </div>
            <?php endforeach; ?>
          </div>
<?php endif; ?>
<?php endif; ?>
<?php require __DIR__ . '/../footer.php' ?>