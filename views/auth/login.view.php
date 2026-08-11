<?php require __DIR__ . '/partials/header.php' ?>
        <h1>Log in</h1>
        <?php if(!empty($errors)) : ?>
        <?php foreach($errors as $error) : ?>
          <p class="error"><?= $error ?></p>
        <?php endforeach; ?>
        <?php endif; ?>
        <form method="POST">
          <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required />
          </div>
          <div class="field">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required />
          </div>
          <button type="submit" class="btn">Log in</button>
        </form>
        <p class="link-row">No account? <a href="/PHP-Blog/public/register">Register</a></p>
<?php require __DIR__ . '/partials/footer.php' ?>