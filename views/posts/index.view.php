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
      <?php require __DIR__ . '/postsData.view.php' ?>
    </main>
    <button type="submit" name="allPosts" value="allPosts">
        <a href="<?= $commonPath ?>allPosts">All Posts</a>
    </button>
<?php require __DIR__ . '/../footer.php' ?>