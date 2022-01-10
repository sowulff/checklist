<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}



function get_user(object $database)
{
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("SELECT * FROM users WHERE id = :id");
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $user_info = [
        'name' => $user['name'],
        'email' => $user['email'],
        'id' => $user['id'],
    ];
    return $user_info;
}



function get_lists(object $database)
{
    $user_id = $_SESSION['user']['id'];

    $statement = $database->prepare("SELECT * FROM lists WHERE user_id = :id");
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $lists = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $lists;
}

function get_tasks(object $database)
{
    $user_id = $_SESSION['user']['id'];


    $statement = $database->prepare('SELECT * FROM tasks WHERE user_id = :user_id ');
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $allTasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $allTasks;
}

function get_tasks_done_doday(object $database)
{
    $user_id = $_SESSION['user']['id'];
    $deadline_at = date('Y-m-d');

    $statement = $database->prepare("SELECT * from tasks WHERE user_id = :user_id AND deadline_at = :deadline_at");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);

    $statement->execute();

    $tasks_due_today = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $tasks_due_today;
}

function get_list_for_task($id, $database)
{
    if ($id) {
        $statement = $database->query('SELECT lists.title from tasks INNER JOIN lists ON tasks.list_id = lists.id WHERE tasks.id = :id;');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $lists = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $lists[0]['title'];
    };
}
