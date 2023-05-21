<?php
session_start();
include 'function1.php';

$_SESSION = [];
session_unset();
session_destroy();

header("Location: login.php");
exit();
?>
