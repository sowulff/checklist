<?php require __DIR__ . '/views/header.php'; ?>
<?php require __DIR__ . '/app/autoload.php'; ?>

<form action="/app/users/upload.php" method="post" enctype="multipart/form-data">
    <label for="avatar">Add a profile picture</label>
    <input type="file" name="avatar" id="avatar" accept=".png, .jpg, .jpeg">
    <button type="submit">Choose image</button>
</form>

<?php echo $_SESSION['user']['img_url'];
?>

<?php require __DIR__ . '/views/footer.php';
