<?php
require __DIR__ . '/../../../autoload.php';

use App\Config\AppConfig;

$commonPath = AppConfig::getCommonPath();
?>
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
                  <?= $shortText ?><a href="<?= $commonPath ?>post?id=<?= $post['post_id'] ?>" style="padding: 1rem;"><button class="read-btn">Read More</button></a>
                </p>
                <div class="status">
                  <?php 
                    $currenttime = time();
                    $created_at = strtotime($post['created_at']);
                    $timeAgo = $currenttime - $created_at;
                    
                    if($timeAgo < 60) {
                      $whenPostCreated = "Just Now";
                    } elseif($timeAgo < 3600) {
                      $whenPostCreated = floor($timeAgo / 60) . " minutes ago";
                    } elseif($timeAgo < 86400) {
                      $whenPostCreated = floor($timeAgo / 3600) . " hours ago";
                    } else {
                      $days = floor($timeAgo / 86400);
                      $whenPostCreated = $days . ($days == 1 ? " day ago" : " days ago");
                    }
                  ?>
                  <p style="padding: 1rem;"><?= $whenPostCreated ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
<?php endif; ?>