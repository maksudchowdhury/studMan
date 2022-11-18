<?php
ini_set('session.use_strict_mode', 1);
session_start();
var_dump($_SESSION);

session_destroy();
var_dump($_SESSION);
header("Location: index.php");

?>
