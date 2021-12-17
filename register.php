<?php

declare(strict_types=1);

$database = new PDO('sqlite:database.db');

if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //insert to database
    $statement = $database->prepare('INSERT INTO users
    (name, email, password)
    VALUES
    (:name, :email, :password)');

    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $hash_password, PDO::PARAM_STR);
    $statement->execute();
}
