<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';






// insert tasks into database
if (isset($_POST['title'])) {
    $list_id = $_GET['id'];
    $title = trim($_POST['title']);
    $userId = $_SESSION['user']['id'];


    $statement = $database->prepare('INSERT INTO tasks (list_id, user_id, title)
    VALUES (:list_id, :user_id, :title)');
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);

    $statement->execute();
}
redirect('/loggedin.php');
