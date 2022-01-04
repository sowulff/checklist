<?php require __DIR__ . '/views/header.php'; ?>
<?php require __DIR__ . '/app/autoload.php'; ?>


<?php if (isset($_SESSION['user']['img_url'])) :
?>
    <div class="curved-container">
        <div class="container">
            <img src="uploads/<?php echo $_SESSION['user']['img_url'] ?>" class="image">
        </div>
    </div>

    <form action="/app/users/upload.php" method="post" enctype="multipart/form-data">
        <label for="avatar">Change profile picture</label>
        <input type="file" name="avatar" id="avatar" accept=".png, .jpg, .jpeg">
        <button type="submit">Upload</button>
    </form>
<?php else : ?>
    <form action="/app/users/upload.php" method="post" enctype="multipart/form-data">
        <label for="avatar">Choose a profile picture</label>
        <input type="file" name="avatar" id="avatar" accept=".png, .jpg, .jpeg">
        <button type="submit">Upload</button>
    <?php endif; ?>
    <form action="/app/users/change_email.php" method="post">
        <label for="email">new email address:</label>
        <input type="email" name="email" id="email">
        <button type="submit">Change email address</button>
    </form>
    <div>Change password</div>
    <form action="/app/users/change_password.php" method="post">
        <label for="password">current password:</label>
        <input name="password" id="password" type="password">
        <label for="new_password">select your password:</label>
        <input name="new_password" id="new_password" type="password">
        <button type="submit">Change password</button>
    </form>

    <div class="delete-profile">
        <a href="#">Delete your account.</a>
    </div>

    <?php require __DIR__ . '/views/footer.php';
