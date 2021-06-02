<html>

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&family=ZCOOL+KuaiLe&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php
    include 'functions.php';

    if (isset($_POST['login']) && isset($_POST['password'])) {
        login($_POST['login'], $_POST['password'], $con);
    }
    if (isset($_SESSION['user']['login']) && isset($_SESSION['user']['password']))
        header('Location: main.php');
    else {
        echo "<div class=loginbox>";
        echo "<form method=post>";
        echo "<h4>Login</h4> <input class=logininput name=login> <br>";
        echo "<h4>Haslo</h4> <input class=logininput name=password type=password> <br>";
        echo "<input type=submit value=Zaloguj>";
        echo "</form>";
        echo "</div>";
    }
    ?>
    <span class='biglogo logo navbar-brand mb-0 h1'><a href='main.php'>Pablo Sabre International</a></span>
</body>

</html>