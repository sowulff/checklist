<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we delete lists in the database.
// and also the tasks in the lists.

if (isset($_POST['delete-list'])) {
    $id =  $_POST['delete-list'];

    $statement = $database->prepare('DELETE FROM lists WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $statement = $database->prepare('DELETE FROM tasks WHERE list_id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}
redirect('/loggedin.php');
