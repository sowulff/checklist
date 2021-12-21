<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>


<?php if (isset($_SESSION['user'])) : ?>
    <p>Welcome, <?= $_SESSION['user']['name']; ?>!</p>
    <a href="profile.php">edit your profile</a>


<?php endif; ?>



<?php require __DIR__ . '/views/footer.php'; ?>
