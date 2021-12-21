<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['password-confirm'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['password-confirm'];
    // $hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($password !== $confirmPassword) {
        $_SESSION['error'] = 'The passwords dosen\'t match, please try again.';
        redirect('/signup.php');
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

    redirect('/login.php');
}
