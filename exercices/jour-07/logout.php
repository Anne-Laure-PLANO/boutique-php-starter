<?php
session_start();
$username= ($_SESSION["user"])??"";

session_destroy();

#header("location:login.php");
?>
