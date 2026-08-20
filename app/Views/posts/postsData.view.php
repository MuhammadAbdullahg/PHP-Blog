<?php require __DIR__ . '/../../../config/config.php' ?>
    <?php if(!empty($posts)) : ?>
          <div style="width: 100%; display: flex; flex-wrap: wrap; align-items:center; justify-content: space-between; ">
            <?php foreach($posts as $post) : ?>
              <?php 
              $description = $post['content'];
              $shortText = substr($description, 0, 30) . '...';
              ?>
              <div class="h-card" style="flex-direction: column; width: 300px; height: 300px;">
              <div class="card_content" style="height: 200px;">
                <img src="<?= $post['image_path'] ?>" style="width: 200px; height: 150px;" alt="laptop guy" />
              </div>
                <h2><?= $post['title'] ?></h2>
                <p>
                  <?= $shortText ?>
                </p>
                <div class="status">
                  <p style="padding: 1rem;"><?= $post['created_at'] ?></p>
                  <a href="<?= $commonPath ?>post?id=<?= $post['id'] ?>" style="padding: 1rem;"><button class="read-btn">Read More</button></a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
<?php endif; ?>