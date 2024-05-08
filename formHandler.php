<?php
declare(strict_types = 1);

session_start();

include_once('functions.php');

if ($_POST['submit_btn']) {

    $_SESSION['text'] = $_POST['text'];

    $image = true;
}
