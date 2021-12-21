<?php

declare(strict_types=1);

require __DIR__ . '../../autoload.php';

if (isset($_FILES['avatar'])) {
    //save in filesystem
    $avatar = trim(filter_var($_FILES['avatar']['name'], FILTER_SANITIZE_STRING));

    $destination =  __DIR__ . '/../../uploads/' . $avatar;
    $avatarTemp = $_FILES['avatar']['tmp_name'];
    move_uploaded_file($avatarTemp, $destination);

    // Adds to database
    $insertSQL = ("UPDATE users SET img_url = :avatar WHERE id = :id");

    $sql = $database->prepare($insertSQL);

    $sql->bindParam(':avatar', $avatar, PDO::PARAM_STR);
    $sql->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $sql->execute();
    redirect('/profile.php');
};
