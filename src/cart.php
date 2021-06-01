<?php
include 'functions.php';
$con = mysqli_connect('localhost', 'root', '', 'store');
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
                <span class="navbar-brand mb-0 h1 username">
                    <?php
                    if (isset($_SESSION['user']['login']))
                        echo "Zalogowany jako: " . ($_SESSION['user']['login']);
                    ?>
                </span>
                <span class="navbar-brand mb-0 h1">
                    <?php
                    if (isset($_SESSION['user']['login']))
                        echo "<a href=main.php?logoff=true>Wyloguj</a></span>";
                    else {
                        echo "<span class=navbar-brand mb-0 h1><a href=index.php>Zaloguj</a></span>";
                    }
                    ?>
            </nav>

            <?php loadCart();


            ?>




        </div>

    </div>


</body>

</html>

<?php

if (isset($_GET['logoff'])) {
    logoff();
}

?>