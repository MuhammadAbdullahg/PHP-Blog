<?php
require __DIR__ . '/../../../autoload.php';

use App\Config\AppConfig;

$configData = (new AppConfig())->configVar();
?>
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
      <div style="width: 87vw; display: flex; align-items: center; justify-content: end;">
        <button type="submit" name="allPosts" value="allPosts">
            <a href="<?= $configData['commonPath'] ?>allPosts" style="color: #fff;">All Posts</a>
        </button>
      </div>
    </main>
<?php require __DIR__ . '/../footer.php' ?>