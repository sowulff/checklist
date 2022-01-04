<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>

<?php if (isset($_SESSION['user'])) : ?>
    <p>Welcome, <?= $_SESSION['user']['name']; ?>!</p>
    <!-- Here is all of the lists of the user  -->


<?php $lists = fetchAllLists($database);

    print_r($lists);

endif; ?>

<h2>Your Lists</h2>

<ul>
    <?php
    $lists = get_lists($database);
    foreach ($lists as $list) : ?>
        <li>
            <?= $list['title'] ?><br>
        </li>
    <?php endforeach ?>
</ul>

<h3>Create New List</h3>
<form action="/app/lists/create.php" method="post">
    <label for="title">Name your list:</label>
    <input name="title" id="title" type="text">
    <button type="submit">Create List</button>
</form>
