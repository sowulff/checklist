<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="stylesheet" href="assets/styles/header.css">
    <link rel="stylesheet" href="assets/styles/footer.css">
    <title>Checklist</title>
</head>

<body>
    <header>

        <?php if (isset($_SESSION['user'])) { ?>
            <h1><a href="/">myList</a></h1>
            <div class="nav-buttons">

                <a href="/app/users/logout.php">log out</a>
            </div>

        <?php } else { ?>

            <h1><a href="/">myList</a></h1>
            <div class="nav-buttons">
                <a href="signup.php">Sign Up</a>
                <a href="login.php">login</a>
            </div>
        <?php } ?>
    </header>
