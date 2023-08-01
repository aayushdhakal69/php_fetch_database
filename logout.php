<?php
$db = new mysqli("localhost", "root", "", "login_database");
$_SESSION =[];
session_unset();
session_destroy();
header("Location: login.php");
?>