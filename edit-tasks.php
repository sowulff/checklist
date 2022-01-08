<?php

declare(strict_types=1); ?>
<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php $statement = $database->prepare('SELECT * FROM tasks WHERE user_id = :userId');
$statement->bindParam(':userId', $_SESSION['user']['id'], PDO::PARAM_INT);
$statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if (isset($_POST['id'])) {
    $id = trim(filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT));
    $statement = $database->prepare('SELECT * FROM tasks WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $task = $statement->fetch(PDO::FETCH_ASSOC);
} ?>

<form action="app/tasks/update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?= $id ?>" name="id">

    <label for="title">Title </label>
    <input class="form-control" type="name" name="title" id="title" value="<?php echo $task['title'] ?>">
    <label for="tasks">Description</label>
    <input class="form-control" type="description" name="description" id="description" value="<?php echo $task['content'] ?>">
    <label for="deadline">Deadline</label>
    <input class="form-control" type="date" name="deadline" id="deadline" value="<?php echo $task['deadline_at'] ?>">

    <button>add changes</button>
</form>

<!-- DELETE TASK BUTTON/FORM -->
