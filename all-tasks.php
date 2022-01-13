<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>
<?php
$tasks = get_tasks($database);
if (isset($_POST['all-tasks'])) : ?>
    <div class="loggedin-container">
        <div class="task-container">

            <h3>Todo</h3>
            <ul>
                <?php foreach ($tasks as $task) : ?>
                    <?php if ($task['completed_at'] === null) : ?>
                        <li>
                            <?= $task['title']; ?>
                        </li>
                        <div class="info-about-task show">
                            <p>description: <?php echo $task['content'] ?></p>
                            <p>deadline: <?php echo $task['deadline_at'] ?></p>
                            <p class="belongs-to-list">list: <?php echo get_list_for_task($task['id'], $database) ?></p>
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
                                <?= $task['title']; ?>
                        </li>
                        <div class="info-about-task show">
                            <p>description: <?php echo $task['content'] ?></p>
                            <p>completed: <?php echo $task['completed_at'] ?></p>
                            <p class="belongs-to-list">list: <?php echo get_list_for_task($task['id'], $database) ?></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
