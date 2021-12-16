<?php require __DIR__ . '/views/header.php';  ?>


<h1>Sign up</h1>

<form action="users/register.php" method="post" enctype="multipart/form-data">

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
        <label for="avatar">Upload profile picture</label>
        <input type="file" name="avatar" id="avatar" accept=".jpg, .png" required>
    </div>


    <button type="submit">Sign up</button>
</form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
