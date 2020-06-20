<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION['user_name']);
header("Location:index.php");
?>