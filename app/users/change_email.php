<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['email'])) {
    $trimmed_email = trim($_POST['email']);
    $email = filter_var($trimmed_email, FILTER_SANITIZE_EMAIL);
    $user_id = $_SESSION['user']['id'];

    //check if alredy exists in db
    $statement = $database->prepare('SELECT email FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $emailExists = $statement->fetch(PDO::FETCH_ASSOC);

    if ($emailExists) {
        echo 'exist in database';
        redirect('/profile.php');
    }

    //changes email
    $statement = $database->prepare("UPDATE users SET email = :email WHERE id = :id");
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();


    redirect('/profile.php');
}
