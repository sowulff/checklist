<?php

declare(strict_types=1); ?>
<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php $listId = $_GET['id']; ?>
<?php $listTitle = $_GET['title']; ?>

<form action="/app/lists/update.php?id=<?= $listId; ?>&title= <?= $listTitle ?>" method="post">

    <label for="new-title">New title:</label>
    <input type="text" name="new-title" id="new-title">

    <button>Change</button>
    <button><a href="/loggedin.php">Cancel</a></button>
</form>
</div>




<?php require __DIR__ . '/views/footer.php'; ?>
