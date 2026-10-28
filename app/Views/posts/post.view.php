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
        
      <div class="post-likes">
          <button
              type="button"
              id="likeBtn"
              data-post-id="<?= (int) $post['post_id'] ?>"
              class="<?= !empty($likeExist) ? 'liked' : '' ?>"
          >
              <span class="like-label">
                  <?= $liked ? '❤️ Liked' : '🤍 Like' ?>
              </span>
          </button>

          <span id="likeCount">
              <?= (int) $likes ?>
          </span>
      </div>

      </article>
      <hr />
      <div class="comment-sec">
        <h2>Comments</h2>
        <hr />
        <div class="comment">
          <input type="text" id="comment-input" style="width: 80%; outline:none; border:none; border-bottom: 1px solid gray; margin-bottom: 1rem;">
          <button type="button" id="comment-btn" data-post-id="<?= (int) $post['post_id'] ?>" style="margin-left: 10rem;">Comment</button>
        </div>
        <div class="comments">
          <p class="comment-user-name">kkhfgi</p>
          <h3 class="comment-user">kjjdhgup</h3>
          <hr>
        </div>
      </div>
    </main>
<?php require __DIR__ . '/../footer.php' ?>