<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

$id = $_GET['id']; ?>

<ul>
    <?php


    $tasks = get_tasks($database);
    foreach ($tasks as $task) : ?>
        <li>
            <form action="/app/tasks/create.php" method="post">
                <input type="checkbox" id="list-checkbox" name="list-checkbox">
                <label for="list-checkbox"><?= $task['title'] ?></label>
            </form>
        </li>
    <?php endforeach ?>
</ul>


<form action="/app/tasks/create.php" method="post">
    <input id="title" name="title" type="text" class="new-task" placeholder="new task name" />
    <button class="create" aria-label="create new task">+</button>
</form>
