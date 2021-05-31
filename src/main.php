<?php
include 'functions.php';
$con = mysqli_connect('localhost', 'root', '', 'store');
session_start();
if (!isset($_SESSION['user']['login']) || !isset($_SESSION['user']['password'])) {
    header("Location: index.php");
}
?>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <div class="mainDiv">

        <div>
            <nav class="navbar navbar-light bg-light justify-content-center">
                <span class="navbar-brand mb-0 h1"><a href="main.php">Sklep</a></span>
                <span class="navbar-brand mb-0 h1"><a href="cart.php">Koszyk</a></span>
                <span class="navbar-brand mb-0 h1"><a href="account.php">Konto</a></span>
                <span class="navbar-brand mb-0 h1">Twórca</span>
                <span class="navbar-brand mb-0 h1">Zalogowany jako: <?php echo ($_SESSION['user']['login']); ?></span>
                <span class="navbar-brand mb-0 h1"><a href="main.php?logoff=true">Wyloguj</a></span>
            </nav>

            <?php fetchProducts($con); ?>




        </div>

    </div>


</body>

</html>

<?php

if (isset($_GET['logoff'])) {
    logoff();
}

?>