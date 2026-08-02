<?php require __DIR__ . '/../header.php' ?>
    <div style="display: flex;align-items:center;justify-content:center;">
  <div class="form-container">
    <h2>Create New Blog Post</h2>
    <?php foreach($errors as $error) : ?>
        <p><?= $error ?></p>
    <?php endforeach ?>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" required>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Category</label>
                <select name="category">
                    <option>Tech</option>
                    <option>Science</option>
                    <option>Food</option>
                    <option>Other</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" rows="10"></textarea>
        </div>
        <button type="submit">Publish</button>
    </form>
  </div>
  </div>
<?php require __DIR__ . '/../footer.php' ?>