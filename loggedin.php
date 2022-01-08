<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>

<?php if (isset($_SESSION['user'])) : ?>
    <p>Welcome, <?= $_SESSION['user']['name']; ?>!</p>
    <!-- Here is all of the lists of the user  -->


<?php


endif; ?>
<div class="loggedin-container">

    <h3>My Lists</h2>
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
                        <a href="loggedin.php?id=<?= $id; ?>&title=<?= $title; ?>"><?php echo $title ?></a>

                        <form action="/app/lists/delete.php" method="post">
                            <input name="delete-list" type="hidden" value="<?= $list['id'] ?>">
                            <button class="loggedin-btn">X</button>
                        </form>
                        <form action="/app/lists/edit.php" method="post">
                            <button class="loggedin-btn" name="edit-list" type="submit" value="<?= $id ?>">edit</button>
                        </form>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>

        <!-- CREATE NEW LIST  -->
        <form action="/app/lists/create.php" method="post">
            <label for="title">Add list</label>
            <input id="title" name="title" type="text" class="new-list" placeholder="new list name" aria-label="new list name" />
            <button class="loggedin-btn">+</button>
        </form>


        <div class="delete-stuff">
            <form action="/loggedin.php" method="post">
                <button name="all-tasks" type="submit" class="loggedin-btn">All tasks for today</button>
            </form>
            <button class="loggedin-btn">View all tasks</button>
            <button class="loggedin-btn">Delete completed tasks</button>
            <button class="loggedin-btn">Delete all tasks ans list</button>

        </div>

        <!-- SHOW ALL LISTS  -->
        <?php
        $tasks = get_tasks($database);
        if (isset($_POST['all-tasks'])) : ?>
            <div class="task-container">
                <h3>Todo</h3>
                <ul>
                    <?php foreach ($tasks as $task) : ?>
                        <li>
                            <form action="/app/tasks/completed.php" method="POST">
                                <input type="hidden" value="<?= $task['id'] ?>" name="id" />
                                <input type="checkbox" name="is_completed" value="<?= $task['id'] ?>" name="id" />
                                <label for="is_completed">
                                    <?= $task['title']; ?>
                                </label>

                                <div>
                                    <button type="submit">Submit</button>
                                </div>
                            </form>
                            <form action="/edit-tasks.php" method="post">
                                <input type="hidden" value="<?= $task['id'] ?>" name="id" />
                                <button class="loggedin-btn" type="submit">EDIT</button>
                            </form>
                            <form action="/app/tasks/delete.php" method="post">
                                <button class="loggedin-btn" name="delete-task" type="submit" value="<?= $task['id'] ?>">Delete</button>
                            </form>
                            <div class="info-about-task">
                                <p>description: <?php echo $task['content'] ?></p>
                                <p>deadline: <?php echo $task['deadline_at'] ?></p>
                                <!-- VILL VISA VILKEN LISTA TASKEN TILLHÖR -->
                                <p>list: <?php echo $task['list_id'] ?></p>

                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif;
        ?>







        <!-- ADD TASK IN LIST  -->

        <?php if (isset($_GET['id'])) : ?>
            <h3 class="list-title"><?= $_GET['title']; ?></h3>
            <form action="/app/tasks/create.php?id=<?= $_GET['id'] ?>&title=<?= $title; ?>" method="post">
                <div>
                    <label for="title">Add task</label>
                    <input id="title" name="title" type="text" class="new-task" placeholder="new task name" />
                </div>
                <div>
                    <input id="content" name="content" type="text" class="new-task" placeholder="description" />

                </div>
                <div>
                    <input id="date" name="date" type="date" class="new-task" />
                    <button class="loggedin-btn" class="create-task" aria-label="create new task">+</button>
                </div>
            </form>


            <div class="task-container">
                <h3>Todo</h3>
                <ul>
                    <?php

                    $tasks = get_tasks($database);
                    foreach ($tasks as $task) :
                        if ($task['list_id'] === $_GET['id']) : ?>
                            <li>
                                <form action="/app/tasks/completed.php" method="POST">
                                    <input type="hidden" value="<?= $task['id'] ?>" name="id" />
                                    <input type="checkbox" name="is_completed" value="<?= $task['id'] ?>" name="id" />
                                    <label for="is_completed">
                                        <?= $task['title']; ?>
                                    </label>

                                    <div>
                                        <button type="submit">Submit</button>
                                    </div>
                                </form>


                                <form action="/edit-tasks.php" method="post">
                                    <input type="hidden" value="<?= $task['id'] ?>" name="id" />
                                    <button class="loggedin-btn" type="submit">EDIT</button>
                                </form>
                                <form action="/app/tasks/delete.php?id=<?= $_GET['id'] ?>&title=<?= $title; ?>" method="post">
                                    <button class="loggedin-btn" name="delete-task" type="submit" value="<?= $task['id'] ?>">Delete</button>
                                </form>
                                <div class="info-about-task">
                                    <p>description: <?php echo $task['content'] ?></p>
                                    <p>deadline: <?php echo $task['deadline_at'] ?></p>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach ?>
                </ul>
            </div>

        <?php endif; ?>




        <!-- TEST  -->
        <!-- <div class="new-container">
    <label for="new-task">Add Item</label>
    <input id="new-task" type="text" />
    <button id="button-first">Add</button>

    <h3>Todo</h3>
    <ul id="incomplete-tasks">
        <li>
            <input type="checkbox" />
            <label>Pay Bills</label>
            <input type="text" /><button class="edit">Edit</button>
            <button class="delete">Delete</button>
        </li>
        <li class="editMode">
            <input type="checkbox" />
            <label>Go Shopping</label>
            <input type="text" value="Go Shopping" />
            <button class="edit">Edit</button>
            <button class="delete">Delete</button>
        </li>
    </ul>

    <h3>Completed</h3>
    <ul id="completed-tasks">
        <li>
            <input type="checkbox" checked />
            <label>See the Doctor</label><input type="text" />
            <button class="edit">Edit</button>
            <button class="delete">Delete</button>
        </li>
    </ul>
</div> -->

</div>

<?php require __DIR__ . '/views/footer.php'; ?>
