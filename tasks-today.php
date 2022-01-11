<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>
<!-- TASKS DONE TODAY  -->

<?php $tasksToday = get_tasks_done_doday($database);
if (isset($_POST['tasks-for-today'])) : ?>
    <div class="loggedin-container">
        <div class="task-container">
            <h3>Todo</h3>
            <ul>
                <?php foreach ($tasksToday as $taskToday) : ?>
                    <li>
                        <?= $taskToday['title']; ?>

                    </li>
                    <div class="info-about-task">
                        <p>description: <?php echo $taskToday['content'] ?></p>
                        <p>deadline: <?php echo $taskToday['deadline_at'] ?></p>
                        <!-- VILL VISA VILKEN LISTA TASKEN TILLHÖR -->
                        <p>list: <?php echo $taskToday['list_id'] ?></p>

                    </div>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

<?php endif;
?>
