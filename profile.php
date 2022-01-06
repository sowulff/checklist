<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<?php if (isset($_SESSION['user']['img_url'])) :
    $userImage = $_SESSION['user']['img_url'];
?>

    <div class="container-profile-image">
        <img src="uploads/<?php echo $userImage ?>" class="image">
    </div>
<?php else : ?>
    <img src="/uploads/default.jpeg" alt="Default profile picture">
<?php endif; ?>

<form action="/app/users/upload.php" method="post" enctype="multipart/form-data">
    <label for="avatar">Change profile picture</label>
    <input type="file" name="avatar" id="avatar" accept=".png, .jpg, .jpeg">
    <button type="submit">Upload</button>
</form>



<ul class="user-info">
    <li>Name: <?php echo $_SESSION['user']['name'] ?> </li>
    <li>Email: <?php echo $_SESSION['user']['email'] ?> <button class="update-profile email">change</button></li>
    <li>Password: ********<button class="update-profile password">change</button></li>
</ul>
<div class="update-profile-container">
    <form class="change-email-form" action="/app/users/change_email.php" method="post">
        <label for="email">new email address:</label>
        <input type="email" name="email" id="email">
        <button class="btn" type="submit">Change email address</button>
    </form>

    <form class="change-password-form" action="/app/users/change_password.php" method="post">
        <label for="password">current password:</label>
        <input name="password" id="password" type="password">
        <label for="new_password">select your password:</label>
        <input name="new_password" id="new_password" type="password">
        <button class="btn" type="submit">Change password</button>
    </form>



    <div class="error-login delete-account"><a href="#">Delete your account.</a></div>

</div>
<?php require __DIR__ . '/views/footer.php';
