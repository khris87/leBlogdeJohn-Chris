<?php
session_star();
$_SESSION = array();
session_destroy();
header("location: index.php");
?>