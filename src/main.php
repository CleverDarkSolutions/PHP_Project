<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <div class="mainDiv">

        <div class="userPanel">Zalogowany jako: <?php echo $_SESSION['user']['login']; ?><br>
            <a href="main.php?logoff=true">Wyloguj</a>
        </div>

        <div>
            <nav className="navbar navbar-dark bg-dark">
                <ul className="navbar-nav mr-auto list-inline">
                    <li className="nav-item list-inline-item">
                        <a className="nav-link">Oferta</a>
                    </li>
                    <li className="nav-item list-inline-item">
                        <a className="nav-link">Koszyk</a>
                    </li>
                    <li className="nav-item list-inline-item">
                        <a className="nav-link">Konto</a>
                    </li>

                    <li className="nav-item list-inline-item">
                        <a className="nav-link">Cos</a>
                    </li>
                </ul>

            </nav>


        </div>

    </div>


</body>

</html>

<?php
include 'functions.php';

if ($_GET['logoff'] == true) {
    logoff();
}

?>