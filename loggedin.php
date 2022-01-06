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
<ul>
    <?php
    $lists = get_lists($database);
    foreach ($lists as $list) : ?>
        <?php
        $title = $list['title'];
        $id = $list['id'];

        ?>
        <li>

            <a href="loggedin.php?id=<?= $id; ?>&title=<?= $title; ?>"><?php echo $title; ?></a>
            <form action="/app/lists/delete.php" method="post">
                <button name="delete-task" type="submit" value="<?= $id ?>">Delete</button>
            </form><br>

        </li>

    <?php endforeach ?>
</ul>
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
        <p class="task-count">X tasks remaining</p>
    </div>

    <div class="todo-body">
        <div class="tasks">
            <div class="task">
                <input type="checkbox" id="PLOCKA FRÅN DATABAS KANSKE" name="task" />
                <label for="task">
                    task name
                </label>
            </div>






            <div class="delete-stuff">
                <button class="delete MARKED">Clear completed tasks</button>
                <button class="delete HELA SKITEN">Delete list</button>
            </div>
        </div>
    </div>
    <div>REAL DEAL</div>



    <ul>
        <?php

        if (isset($_GET['id'])) :
            $tasks = get_tasks($database);
            foreach ($tasks as $task) :
                if ($task['list_id'] = $_GET['id']) :
        ?>
                    <li>
                        <?php echo $task['list_id']; ?>
                        <form action="/app/tasks/create.php" method="post">
                            <input type="checkbox" id="list-checkbox" name="list-checkbox">
                            <label for="list-checkbox"><?= $task['title'] ?></label>
                        </form>
                    </li>
                <?php endif; ?>
            <?php endforeach ?>
    </ul>
<?php else :
            echo 'please choose a list.'
?>
<?php endif; ?>
<form action="/app/tasks/create.php?id=<?= $_GET['id'] ?>" method="post">
    <div>
        <input id="title" name="title" type="text" class="new-task" placeholder="new task name" />
    </div>
    <div>
        <input id="title" name="title" type="text" class="new-task" placeholder="description" />

    </div>
    <div>
        <input id="date" name="date" type="date" class="new-task" placeholder="due date" />
        <button class="create" aria-label="create new task">+</button>
    </div>
</form>
