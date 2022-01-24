<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we can mark all of the tasks as uncompleted.

if (isset($_POST['id'])) {
    $listId = $_POST['id'];
    $listTitle = $_GET['title'];
    $userId = $_SESSION['user']['id'];
    $statement = $database->prepare(
        'UPDATE tasks SET completed_at = NULL WHERE user_id = :user_id'
    );
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
}
redirect('/loggedin.php?id=' . $listId . '&title=' . $listTitle);
