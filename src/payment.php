<?php
include 'functions.php';
$con = mysqli_connect('localhost', 'root', '', 'store');
if (!isset($_SESSION['user']['login']))
    header("Location: main.php");
?>

<html>

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&family=ZCOOL+KuaiLe&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <div class="mainDiv">

        <div>

            <span class='mediumlogo logo navbar-brand mb-0 h1'><a href='main.php'>Pablo Sabre International</a></span>

        </div>

    </div>


</body>

</html>