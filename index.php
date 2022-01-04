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
            <h2>LOGIN</h2>
            <div class="error-login">Incorrect something.</div>
            <form action="app/users/login.php" method="post" class="login-form">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">

                <a class="forgot" href="#">Forgot Password?</a>
                <button type="submit" class="btn">Login</button>

            </form>
        </div>

        <div class="sign-up-container">
            <h2>CREATE ACCOUNT</h2>
            <div class="error-login">Incorrect something.</div>
            <form action="app/users/register.php" method="post" enctype="multipart/form-data">

                <div>
                    <label for="name">Name</label>
                    <input type="name" name="name" id="name" required>

                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>

                </div>

                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>

                </div>
                <div>
                    <label for="password-confirm">Confirm password</label>
                    <input type="password" name="password-confirm" id="password-confirm" required>
                </div>



                <button type="submit" class="btn">Create</button>
            </form>
        </div>
    </div>
</article>


<?php require __DIR__ . '/views/footer.php'; ?>
