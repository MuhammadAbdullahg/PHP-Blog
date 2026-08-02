<?php require __DIR__ . '/../header.php' ?>
    <main>
      <section id="hero">
        <div class="hero_content">
          <h1>Make Zone Better !</h1>
          <h4>Why Better Zone Important ?</h4>
        </div>
        <div class="hero_image">
          <img src="images/hero.png" alt="hero" />
        </div>
      </section>
      <?php if(isset($_SESSION['user_id'])) : ?>
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
    </main>
<?php require __DIR__ . '/../footer.php' ?>