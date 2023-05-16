<?php
require 'function1.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: login.php");

?>