<?php require __DIR__ . '/views/header.php'; ?>
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
</article>
