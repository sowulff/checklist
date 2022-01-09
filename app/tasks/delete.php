<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we delete tasks in the database.


if (isset($_POST['id'])) {
    $taskId =  $_POST['id'];
    $list_id = $_GET['id'];
    $list_title = $_GET['title'];
    $statement = $database->prepare('DELETE FROM tasks WHERE id = :id');
    $statement->bindParam(':id', $taskId, PDO::PARAM_INT);

    $statement->execute();
}
// redirect('/loggedin.php');
redirect('/loggedin.php?id=' . $list_id . '&title=' . $list_title);
