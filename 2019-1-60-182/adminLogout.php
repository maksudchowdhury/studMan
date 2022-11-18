<?php
ini_set('session.use_strict_mode', 1);
session_start();
var_dump($_SESSION);
// Unset all of the session variables.
// session_regenerate_id();
session_destroy();
var_dump($_SESSION);
header("Location: admin.php");

?>
