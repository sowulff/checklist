<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="stylesheet" href="assets/styles/header.css">
    <link rel="stylesheet" href="assets/styles/footer.css">
    <link rel="stylesheet" href="assets/styles/signup.css">
    <title>Checklist</title>
</head>

<body>
    <header>

        <?php if (isset($_SESSION['user'])) { ?>
            <div class="logo"><a href="/">myList.</a></div>
            <div class="nav-buttons">

                <a href="/app/users/logout.php">log out</a>
            </div>

        <?php } else { ?>

            <div class="logo"><a href="/">myList.</a></div>
            <div class="nav-buttons">
                <a href="signup.php">About us</a>
                <a href="login.php">Demo</a>
            </div>
        <?php } ?>
    </header>
