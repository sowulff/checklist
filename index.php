<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>


<!-- this is the welcome page and login/signup page  -->

<article class="welocome-signup">
    <div class="hero">
        <img src="berg.jpg" width="100%">
        <div class="text-on-image">
            <h1>
                <div class="big-welcome">Get shit done</div>
                <span class="small-to">with</span> <span class="color-logo">myList.</span>
            </h1>
            <p>
                Welcome to myList, where dreams become true.
                Create different lists where you can add unlimited number of tasks.
            </p>
        </div>
    </div>
    <div class="form-container">
        <div class="log-in-container">
            <h2>LOGIN</h2>
            <?php if (isset($_SESSION['errors'])) : ?>
                <?php foreach ($_SESSION['errors'] as $error) : ?>
                    <div class="error-login">
                        <?= $error; ?>
                    </div>
                <?php endforeach; ?>
                <?php unset($_SESSION['errors']) ?>
            <?php endif; ?>






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
