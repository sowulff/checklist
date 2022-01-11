<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';






if (isset($_POST['id'])) {

    $listId = $_GET['id'];
    $listTitle = $_GET['title'];

    $id = $_POST['id'];
    $myNull = null;

    $statement = $database->prepare(
        'UPDATE tasks SET completed_at = :date WHERE id = :id'
    );
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':date', $myNull, PDO::PARAM_NULL);

    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
}
redirect('/loggedin.php?id=' . $listId . '&title=' . $listTitle);
