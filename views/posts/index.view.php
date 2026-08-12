<?php require __DIR__ . '/../header.php' ?>
    <main>
      <section id="hero">
        <div class="hero_content">
          <h1>Make Zone Better !</h1>
          <h4>Why Better Zone Important ?</h4>
        </div>
        <div class="hero_image" style="width: max-content;">
          <img src="images/logo.png" alt="hero" style="width: 50rem;"/>
        </div>
      </section>
      <?php require __DIR__ . '/postsData.view.php' ?>
      <div style="width: 87vw; display: flex; align-items: center; justify-content: end;">
        <button type="submit" name="allPosts" value="allPosts">
            <a href="<?= $commonPath ?>allPosts" style="color: #fff;">All Posts</a>
        </button>
      </div>
    </main>
<?php require __DIR__ . '/../footer.php' ?>