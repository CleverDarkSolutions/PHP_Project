<?php
include 'functions.php';
$con = mysqli_connect('localhost', 'root', '', 'store');
if(!isset($_SESSION['user']['login']))
    header("Location: main.php");

pay($_SESSION['summary'], $con);
logoff();
?>