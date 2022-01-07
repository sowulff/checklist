<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$user_id = get_user($database)['id'];
$list_id = $_GET['list_id'];
$task_id = $_GET['task_id'];
