<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>

<?php if (isset($_SESSION['user'])) : ?>
    <p>Welcome, <?= $_SESSION['user']['name']; ?>!</p>
    <!-- Here is all of the lists of the user  -->


<?php


endif; ?>

<h2 class="list-title">My Lists</h2>
<div class="list-container">
    <ul>
        <?php
        $lists = get_lists($database);
        foreach ($lists as $list) : ?>
            <?php
            $title = $list['title'];
            $id = $list['id'];

            ?>
            <li>
                <h4><?php echo $title ?></h4>
                <a href="loggedin.php?id=<?= $id; ?>&title=<?= $title; ?>">open</a>
                <form action="/app/lists/delete.php" method="post">
                    <button name="delete-list" type="submit" value="<?= $id ?>">X</button>
                </form>
            </li>


        <?php endforeach ?>
    </ul>
</div>
<?php
// echo $_GET['title'];
?>

<!-- CREATE NEW LIST  -->
<form action="/app/lists/create.php" method="post">
    <input id="title" name="title" type="text" class="new-list" placeholder="new list name" aria-label="new list name" />
    <button class="create-list">+</button>
</form>


<!-- GET TITLE FROM LIST  -->
<div class="todo-list">
    <div class="todo-header">
        <h2 class="list-title"><?= $_GET['title']; ?></h2>
    </div>

    <div class="delete-stuff">
        <button class="delete MARKED">Tasks for today</button>
        <button class="delete MARKED">View all tasks</button>
        <button class="delete MARKED">Delete completed tasks</button>
        <button class="delete MARKED">Delete all tasks ans list</button>
    </div>
</div>



<div class="task-container">
    <ul>
        <?php

        if (isset($_GET['id'])) :
            $tasks = get_tasks($database);
            foreach ($tasks as $task) :
                if ($task['list_id'] = $_GET['id']) : ?>
                    <li>
                        <?php echo $task['list_id']; ?>
                        <form action="/app/tasks/completed.php" method="post">
                            <input type="checkbox" id="list-checkbox" name="list-checkbox">
                            <label for="list-checkbox"><?= $task['title'] ?></label>
                        </form>


                        <form action="/app/tasks/edit-task" method="post">
                            <button name="edit-task" value="<?= $task['id'] ?>" type="submit">edit</button>
                        </form>

                        <form action=" /app/tasks/delete.php" method="post">
                            <button name="delete-task" type="submit" value="<?= $task['id'] ?>">Delete</button>
                        </form>
                    </li>
                    <p>description: <?php echo $task['content'] ?></p>
                    <p>deadline: <?php echo $task['deadline_at'] ?></p>
                <?php endif; ?>
            <?php endforeach ?>
    </ul>
</div>
<?php else :
            echo 'please choose a list.'
?>
<?php endif; ?>
<form action="/app/tasks/create.php?id=<?= $_GET['id'] ?>" method="post">
    <div>
        <input id="title" name="title" type="text" class="new-task" placeholder="new task name" />
    </div>
    <div>
        <input id="content" name="content" type="text" class="new-task" placeholder="description" />

    </div>
    <div>
        <input id="date" name="date" type="date" class="new-task" />
        <button class="create-task" aria-label="create new task">+</button>
    </div>
</form>
