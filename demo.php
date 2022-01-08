<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
?>

<div class="loggedin-container">

    <h3>My Lists</h2>
        <div class="list-container">
            <ul>
                <li>
                    <a href="#">Work</a>
                    <button class="loggedin-btn">X</button>
                    <button class="loggedin-btn" name="edit-list" type="submit" value="<?= $id ?>">edit</button>
                </li>

            </ul>
        </div>
