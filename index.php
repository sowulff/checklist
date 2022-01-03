<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>


<!-- this is the welcome page and login/signup page  -->

<article class="welocome-signup">
    <div class="hero">
        <h1>
            <div class="big-welcome">Welcome</div>
            <span class="small-to">to</span> myList.

        </h1>
        <p>
            Welocome to myList, ipsum dolor sit amet, consectetur adipiscing
            elit. Curabitur et est sed felis aliquet sollicitudin.
        </p>
    </div>
    <div class="form-container">
        <div class="log-in-container">
            <h2>Log in</h2>
            <span>Don't have an account? <a href="signup.php">Create Your Account</a> it takes less than a minute</span>

            <form action="app/users/login.php" method="post" class="login-form">
                <label for="email">email address:</label>
                <input type="email" name="email" id="email">
                <label for="password">password:</label>
                <input type="password" name="password" id="password">
                <div class="login-forgot">
                    <button type="submit" class="btn">Login</button>
                    <a class="forgot" href="#">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>
    <div class="clip">
        my clip path
    </div>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>



<?php require __DIR__ . '/views/footer.php'; ?>
