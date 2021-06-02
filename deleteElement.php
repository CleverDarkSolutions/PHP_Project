<?php 

include 'functions.php';

session_start();
deleteItem($_GET['index']);
header("Location: cart.php");
?>