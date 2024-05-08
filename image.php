<?php
declare(strict_types = 1);

session_start();

header("Content-type: image/png");

include_once('functions.php');

$font = './times.ttf';
$fontSize = 14;

createStringImg($fontSize, $_SESSION['text'], $font);
