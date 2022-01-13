<?php require __DIR__ . '/app/autoload.php'; ?>

<?php require __DIR__ . '/views/header.php'; ?>

<?php $listId = $_GET['id']; ?>
<?php $listTitle = $_GET['title']; ?>

<div class="new-task-container">
    <form class="new-list-form" action="/app/lists/update.php?id=<?= $listId; ?>&title= <?= $listTitle ?>" method="post">
        <label for="new-title">New title:</label>
        <input type="text" name="new-title" id="new-title">
        <div class="edit-task-buttons">
            <button class="update-profile">Change</button>
            <button class="update-profile"><a href="/loggedin.php">Cancel</a></button>
        </div>
    </form>
</div>




<?php require __DIR__ . '/views/footer.php'; ?>
