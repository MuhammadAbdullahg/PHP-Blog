<?php require __DIR__ . '/../header.php' ?>
    <main class="post">
      <section>
        <div class="banner_image">
          <img src="<?= $post['image_path'] ?>" alt="banner" />
        </div>
        <h1><?= $post['title'] ?></h1>
        <div class="about-author">
          <p><?= $post['created_at'] ?></p>
        </div>
      </section>
      <hr />
      <article>
        <p>
          <?= $post['content'] ?>
        </p>
      </article>
    </main>
<?php require __DIR__ . '/../footer.php' ?>