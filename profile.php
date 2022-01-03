<?php require __DIR__ . '/views/header.php'; ?>
<?php require __DIR__ . '/app/autoload.php'; ?>


<?php if (isset($_SESSION['user']['img_url'])) :
?>
    <div class="curved-container">
        <div class="container">
            <img src="uploads/<?php echo $_SESSION['user']['img_url'] ?>" class="image">
        </div>

        <div class="text-on-image">
            <div class="text">Change profile pic</div>
        </div>
    </div>

<?php endif; ?>

<form action="/app/users/upload.php" method="post" enctype="multipart/form-data">
    <label for="avatar">Add a profile picture</label>
    <input type="file" name="avatar" id="avatar" accept=".png, .jpg, .jpeg">
    <button type="submit">Upload</button>
</form>

<form action="/app/users/change_email.php" method="post">
    <label for="email">new email address:</label>
    <input type="email" name="email" id="email">
    <button type="submit">Change email address</button>
</form>

<div class="delete-profile">
    <p>Delete your profile and all the userinformation permanent.</p>
</div>

<?php require __DIR__ . '/views/footer.php';
