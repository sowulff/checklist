<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['new-name'], $_POST['new-email'], $_POST['new-password'], $_POST['password-confirm'])) {
    $name = trim($_POST['new-name']);
    $email = trim($_POST['new-email']);
    $password = $_POST['new-password'];
    $confirmPassword = $_POST['password-confirm'];
    // $hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($password !== $confirmPassword) {
        $_SESSION['errors'][] = "The passwords dosen't match.";
        redirect('/index.php');
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
    }

    //insert to database
    $statement = $database->prepare('INSERT INTO users
    (name, email, password)
    VALUES
    (:name, :email, :password)');

    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);
    $statement->execute();

    redirect('/');
}
