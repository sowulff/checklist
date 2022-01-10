<?php

declare(strict_types=1); ?>
<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>



<form action="app/tasks/update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?= $id ?>" name="id" id="id">

    <label for="title">Title </label>
    <input class="form-control" type="name" name="title" id="title" value="<?php echo $task['title'] ?>">
    <label for="tasks">Description</label>
    <input class="form-control" type="description" name="description" id="description" value="<?php echo $task['content'] ?>">
    <label for="deadline">Deadline</label>
    <input class="form-control" type="date" name="deadline" id="deadline" value="<?php echo $task['deadline_at'] ?>">

    <button>add changes</button>
</form>

<!-- DELETE TASK BUTTON/FORM -->
