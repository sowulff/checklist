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

<h2 class="list-title">My Lists</h2>
<ul>
    <?php
    $lists = get_lists($database);
    foreach ($lists as $list) : ?>
        <li>
            <?= $list['title'] ?> <form action="/app/lists/delete.php" method="post">
                <button name="delete-task" type="submit" value="<?= $list['id'] ?>">Delete</button>
            </form><br>

        </li>
    <?php endforeach ?>
</ul>
<form action="/app/lists/create.php" method="post">
    <input id="title" name="title" type="text" class="new-list" placeholder="new list name" aria-label="new list name" />
    <button class="create-list">+</button>
</form>



<div class="todo-list">
    <div class="todo-header">
        <h2 class="list-title">LIST TITLE</h2>
        <p class="task-count">X tasks remaining</p>
    </div>

    <div class="todo-body">
        <div class="tasks">
            <div class="task">
                <input type="checkbox" id="PLOCKA FRÅN DATABAS KANSKE" />
                <label for="task-1">
                    <span class="checkbox"></span>
                    record todo list video
                </label>
            </div>
            <!-- /task-1 -->

            <div class="task">
                <input type="checkbox" id="VET INTE" />
                <label for="task-2">
                    <span class="checkbox"></span>
                    another task
                </label>
            </div>
            <!-- /task-2 -->

            <div class="task">
                <input type="checkbox" id="task-3" />
                <label for="task-3">
                    <span class="checkbox"></span>
                    a third task
                </label>
            </div>
            <!-- /task-3 -->
        </div>

        <div class="new-task-creator">
            <form action="">
                <input type="text" class="new task" placeholder="new task name" />
                <button class="create" aria-label="create new task">+</button>
            </form>
        </div>

        <div class="delete-stuff">
            <button class="delete MARKED">Clear completed tasks</button>
            <button class="delete HELA SKITEN">Delete list</button>
        </div>
    </div>
</div>
