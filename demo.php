<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>

<div class="loggedin-container demo">
    <p class="p-demo">This is how it looks when you're logged in!</p>
    <form>
        <label for="title">Add list</label>
        <div>
            <input id="title" name="title" type="text" class="new-list" placeholder="new list name" aria-label="new list name" />
            <button class="loggedin-btn-plus">+</button>
        </div>
    </form>
    <h3>My Lists</h2>
        <div class="list-container">
            <ul>


                <li>
                    <a class="list-link" href="#">Work</a>
                    <div class="edit-delete-buttons">
                        <form>
                            <input name="edit-list" type="hidden">
                            <button class=" loggedin-btn">edit</button>
                        </form>
                        <form>
                            <input name="delete-list" type="hidden">
                            <button class=" loggedin-btn">delete</button>
                        </form>
                    </div>
                </li>
                <li>
                    <a class="list-link" href="#">List title</a>
                    <div class="edit-delete-buttons">
                        <form>
                            <input name="edit-list" type="hidden">
                            <button class=" loggedin-btn">edit</button>
                        </form>
                        <form>
                            <input name="delete-list" type="hidden">
                            <button class=" loggedin-btn">delete</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>




        <!-- BUTTONS -->

        <div class="show-stuff">
            <form>
                <button name="all-tasks" type="submit" class="loggedin-btn">All tasks</button>
            </form>
            <form>
                <button name="tasks-for-today" type="submit" class="loggedin-btn">Tasks for today</button>
            </form>
        </div>


        <!-- ADD TASK IN LIST  -->


        <h2 class="list-title"> List title </h2>
        <form class="new-list-form">
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
                <li>
                    <form class="list-flex">
                        <input type="hidden" value="<?= $task['id'] ?>" name="id" />
                        <input type="checkbox" name="is_completed" id="is_completed" />
                        <label for="is_completed">
                            to do
                        </label>
                    </form>

                    <div class="edit-delete-buttons">
                        <form>
                            <input name="edit-list" type="hidden" value="<?= $task['id'] ?>">
                            <button class="loggedin-btn">edit</button>
                        </form>

                        <form>
                            <input type="hidden" name="id" id="id" />
                            <button class="loggedin-btn">delete</button>
                        </form>
                    </div>
                </li>
                <div class="info-about-task show">
                    <p>description: clean up the house.</p>
                    <p>deadline: 2022-01-11</p>
                </div>
            </ul>
        </div>
        <div class="task-container">
            <h3>Completed</h3>
            <ul>
                <li>
                    <form class="list-flex">
                        <input type="hidden" name="id" />
                        <input type="checkbox" name="is_completed" id="is_completed" checked />
                        <label class="line-thru" for="is_completed">
                            task title
                        </label>
                    </form>
                    <div class="edit-delete-buttons">
                        <form>
                            <input name="edit-list" type="hidden">
                            <button class="loggedin-btn">edit</button>
                        </form>
                        <form>
                            <input type="hidden" name="id" id="id" />
                            <button class="loggedin-btn" type="submit">delete</button>
                        </form>
                    </div>
                </li>
                <div class="info-about-task show">
                    <p>description: about the task. </p>
                    <p>completed: 2022-01-01</p>
                </div>

            </ul>
        </div>
        <form>
            <button class="loggedin-btn-delete">Delete completed tasks</button>
        </form>




</div>

<?php require __DIR__ . '/views/footer.php'; ?>
