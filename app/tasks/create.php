<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';






// insert tasks into database
if (isset($_POST['title'])) {
    $list_id = $_GET['id'];
    $list_title = $_GET['title'];
    $deadline_at = $_POST['date'];
    $content = $_POST['content'];
    $title = trim($_POST['title']);
    $userId = $_SESSION['user']['id'];
    $myNull = null;


    $statement = $database->prepare('INSERT INTO tasks (list_id, user_id, title, deadline_at, content, completed_at)
    VALUES (:list_id, :user_id, :title, :deadline_at, :content, :completed_at)');
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);
    $statement->bindParam(':content', $content, PDO::PARAM_STR);
    $statement->bindParam(':completed_at', $myNull, PDO::PARAM_NULL);

    $statement->execute();
}

redirect('/loggedin.php?id=' . $list_id . '&title=' . $list_title);
