<?php

include 'functions.php';
session_start();
addToCart($_GET['id']);
header("Location: main.php");
$_SESSION['itemCount'] += 1;
?>