<?php require __DIR__ . '/views/header.php';  ?>


<h1>Create account</h1>
<div class="form-container">
    <div class="sign-up-container">
        <span>Use your email for registration</span>
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



            <button type="submit">Sign up</button>
        </form>
    </div>
    <div class="sign-in-container">
        <h1>Log in</h1>
        <span>or use your account</span>

        <form action="app/users/login.php" method="post">
            <label for="email">email address:</label>
            <input type="email" name="email" id="email">
            <label for="password">password:</label>
            <input type="password" name="password" id="password">
            <button type="submit">Login</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/views/footer.php'; ?>
