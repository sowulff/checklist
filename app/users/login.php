<?php


declare(strict_types=1);

require __DIR__ . '/../autoload.php';






if (isset($_POST['email'], $_POST['password'])) {
    $email = trim($_POST['email']);
    $statement = $database->prepare('SELECT * FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();

    // Fetch the user as an associative array.
    $user = $statement->fetch(PDO::FETCH_ASSOC);




    // If we couldn't find the user in the database, redirect back to the login
    // page with our custom redirect function.

    if (!$user) {
        $_SESSION['errors'][] = "The email or password is not correct!";
        redirect('/index.php');
    }


    if (password_verify($_POST['password'], $user['password'])) {

        unset($user['password']);

        $_SESSION['user'] = $user;
    }
}


redirect('/loggedin.php');
