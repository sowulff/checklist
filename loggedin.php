<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
print_r($_SESSION['error']);
?>

<?php if (isset($_SESSION['user'])) : ?>
    <p>Welcome, <?= $_SESSION['user']['name']; ?>!</p>

    <!-- CREATE NEW LIST  -->
    <form class="new-list-form" action="/app/lists/create.php" method="post">
        <label for="title">Add list</label>
        <div>
            <input id="title" name="title" type="text" class="new-list" placeholder="new list name" aria-label="new list name" />
            <button class="loggedin-btn-plus">+</button>
        </div>
    </form>

<?php
endif; ?>
<?php
// SHOW LISTS
$lists = get_lists($database);
if (!empty($lists)) : ?>
    <div class="loggedin-container">
        <h3>My Lists</h2>
            <div class="list-container">
                <ul>
                    <?php
                    foreach ($lists as $list) : ?>
                        <?php
                        $title = $list['title'];
                        $id = $list['id'];

                        ?>
                        <li>
                            <a href="loggedin.php?id=<?= $id; ?>&title=<?= $title; ?>"><?php echo $title ?></a>
                            <div class="edit-delete-buttons">
                                <form action="/edit-list.php" method="post">
                                    <input name="edit-list" type="hidden" value="<?= $list['id'] ?>">
                                    <button class="loggedin-btn">edit</button>
                                </form>
                                <form action="/app/lists/delete.php" method="post">
                                    <input name="delete-list" type="hidden" value="<?= $list['id'] ?>">
                                    <button class="loggedin-btn">delete</button>
                                </form>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>



        <!-- BUTTONS -->

        <div class="show-stuff">
            <form action="/all-tasks.php" method="post">
                <button name="all-tasks" type="submit" class="loggedin-btn">All tasks</button>
            </form>
            <form action="/tasks-today.php" method="post">
                <button name="tasks-for-today" type="submit" class="loggedin-btn">Tasks for today</button>
            </form>
        </div>


        <!-- ADD TASK IN LIST  -->

        <?php if (isset($_GET['id'])) : ?>
            <h2 class="list-title"><?= $_GET['title']; ?></h2>
            <form class="new-list-form" action="/app/tasks/create.php?id=<?= $_GET['id'] ?>&title=<?= $title; ?>" method="post">
                <label for="title">Add task</label>
                <div>
                    <input id="title" name="title" type="text" class="new-task" placeholder="new task name" />
                </div>
                <div>
                    <input id="content" name="content" type="text" class="new-task" placeholder="description" />

                </div>
                <div>
                    <input class="input-date" id="date" name="date" type="date" class="new-task" />
                    <button class="loggedin-btn-plus" class="create-task" aria-label="create new task">+</button>
                </div>
            </form>


            <div class="task-container">
                <h3>Todo</h3>
                <ul>
                    <?php

                    $tasks = get_tasks($database);
                    foreach ($tasks as $task) :
                        if ($task['list_id'] === $_GET['id'] && $task['completed_at'] === null) : ?>
                            <li>
                                <?php $isCompleted = isset($_POST['is_completed']); ?>
                                <form action="/app/tasks/completed.php" method="POST">
                                    <input type="hidden" value="<?= $task['id'] ?>" name="id" />
                                    <input type="checkbox" name="is_completed" id="is_completed" />
                                    <label for="is_completed">
                                        <?= $task['title']; ?>
                                    </label>

                                    <div>
                                        <button type="submit">Submit</button>
                                    </div>
                                </form>

                                <div class="edit-delete-buttons">


                                    <a href="edit-tasks.php">edit</a>

                                    <form action="/app/tasks/delete.php" method="post">
                                        <input type="hidden" value="<?= $task['id'] ?>" name="id" id="id" />
                                        <button class="loggedin-btn">delete</button>
                                    </form>
                                </div>
                            </li>
                            <div class="info-about-task show">
                                <p>description: <?php echo $task['content'] ?></p>
                                <p>deadline: <?php echo $task['deadline_at'] ?></p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach ?>
                </ul>
            </div>


            <div class="task-container">
                <h3>Completed</h3>
                <ul>
                    <?php foreach ($tasks as $task) :
                        if ($task['completed_at'] !== null) : ?>
                            <li>
                                <form action="/app/tasks/not-completed.php" method="POST">

                                    <input type="hidden" value="<?= $task['id'] ?>" name="id" />
                                    <input type="checkbox" name="is_completed" id="is_completed" checked />
                                    <label for="is_completed">
                                        <?= $task['title']; ?>
                                    </label>
                                    <div>
                                        <button type="submit">Submit</button>
                                    </div>

                                </form>

                                <div class="edit-delete-buttons">

                                    <a href="edit-tasks.php">edit</a>
                                    </form>
                                    <form action="/app/tasks/delete.php" method="post">
                                        <input type="hidden" value="<?= $task['id'] ?>" name="id" id="id" />
                                        <button class="loggedin-btn" type="submit">delete</button>
                                    </form>
                                </div>
                            </li>
                            <div class="info-about-task show">
                                <p>description: <?php echo $task['content'] ?></p>
                                <p>completed: <?php echo $task['completed_at'] ?></p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach ?>
                </ul>
            </div>
            <form action="/delete.php" method="post">
                <button class="loggedin-btn-delete">Delete completed tasks</button>
            </form>
        <?php endif; ?>
        <?php

        ?>



    </div>

    <?php require __DIR__ . '/views/footer.php'; ?>
