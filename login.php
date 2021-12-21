<?php require __DIR__ . '/views/header.php'; ?>


<h1>Log in</h1>

<form action="app/users/login.php" method="post">
    <label for="email">email address:</label>
    <input type="email" name="email" id="email">
    <label for="password">password:</label>
    <input type="password" name="password" id="password">
    <button type="submit">Login</button>
</form>
