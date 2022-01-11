<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we delete tasks in the database.


if (isset($_POST['delete-completed'])) {
    $taskId =  $_POST['delete-completed'];
    $user_id = $_SESSION['user']['id'];
    $notNull = '';

    // $list_id = $_GET['id'];
    // $list_title = $_GET['title'];

    $statement = $database->prepare('DELETE FROM tasks WHERE user_id = :user_id AND completed_at IS NOT NULL ');

    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    $statement->execute();
}
// redirect('/loggedin.php');
redirect('/loggedin.php?id=' . $list_id . '&title=' . $list_title);
