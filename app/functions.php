<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

function fetchAllLists(PDO $database): array
{
    $sql = $database->prepare('SELECT * FROM lists WHERE user_id = :id');
    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $sql->execute();

    $lists = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $lists;
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
