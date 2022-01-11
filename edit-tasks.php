<?php

declare(strict_types=1); ?>
<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php $listId = $_GET['id'];
$taskId = $_GET['task_id'];
$title = $_GET['title']; ?>

<form action="/app/tasks/update.php?id=<?= $listId ?>&task_id=<?= $taskId ?>&title=<?= $title ?>" method="post">

    <label for="new-title">New title:</label>
    <input type="text" name="new-title" id="new-title">

    <label for="new-description">New description:</label>
    <input type="text" name="new-description" id="new-description"></textarea>

    <label for="new-deadline">New deadline:</label>
    <input type="date" name="new-deadline" id="new-deadline">

    <button>Change</button>
    <button><a href="/individual-list.php?id=<?= $listId ?>">Cancel</a></button>
</form>

<!-- DELETE TASK BUTTON/FORM -->
