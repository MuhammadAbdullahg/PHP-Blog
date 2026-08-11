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
                  <a href="/PHP-Blog/public/post?id=<?= $post['id'] ?>"><button class="read-btn">Read More</button></a>
                </div>
              </div>
                <img src="<?= $post['image_path'] ?>" alt="laptop guy" />
              </div>
            <?php endforeach; ?>
          </div>
<?php endif; ?>
<?php endif; ?>