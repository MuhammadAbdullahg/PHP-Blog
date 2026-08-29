<?php
require __DIR__ . '/../../../autoload.php';

use App\Config\AppConfig;

$commonPath = AppConfig::getCommonPath();
?>
<?php require __DIR__ . '/partials/header.php' ?>
        <h1>Create account</h1>
        <?php if(!empty($errors)) : ?>
        <?php foreach($errors as $error) : ?>
          <p class="error"><?= $error ?></p>
        <?php endforeach; ?>
        <?php endif; ?>
        <form method="POST">
          <div class="field">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($_POST['name'] ?? "")  ?>" required />
          </div>
          <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? "")  ?>" required />
          </div>
          <div class="field">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="<?= htmlspecialchars($_POST['password'] ?? "")  ?>" required />
          </div>
          <button type="submit" class="btn">Register</button>
        </form>
        <p class="link-row">
          Already have an account? <a href="<?= $commonPath ?>login">Login</a>
        </p>
<?php require __DIR__ . '/partials/footer.php' ?>
