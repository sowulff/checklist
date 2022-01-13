<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php $listId = $_GET['id'];
$taskId = $_GET['task_id'];
$title = $_GET['title']; ?>

<div class="new-task-container">
    <form class="new-list-form" action="/app/tasks/update.php?id=<?= $listId ?>&task_id=<?= $taskId ?>&title=<?= $title ?>" method="post">
        <label for="new-title">New title:</label>
        <div>
            <input type="text" name="new-title" id="new-title">
        </div>
        <label for="new-description">New description:</label>
        <div>
            <input type="text" name="new-description" id="new-description"></textarea>
        </div>
        <label for="new-deadline">New deadline:</label>
        <div>
            <input type="date" name="new-deadline" id="new-deadline">
        </div>
        <div class="edit-task-buttons">
            <button class="update-profile">Change</button>
            <button class="update-profile"><a href="loggedin.php">Cancel</a></button>
        </div>
    </form>
</div>
<!-- DELETE TASK BUTTON/FORM -->
