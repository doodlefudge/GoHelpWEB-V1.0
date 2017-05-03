<?php

$link = mysqli_connect('localhost', 'root', '');

if (!$link) {
    die('Could not connect: ' . mysqli_error());
}

$db_selected = mysqli_select_db($link, 'bckcai');