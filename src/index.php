<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php
    include 'functions.php';
    $con = mysqli_connect('localhost','root', '', 'store');
    session_start();
    if(isset($_POST['login']) && isset($_POST['password'])){
        login($_POST['login'], $_POST['password'], $con);
    }
    if (isset($_SESSION['user']['login']) && isset($_SESSION['user']['password']))
        header('Location: main.php');
    else {
        echo "<form method=post>";
        echo "Login: <input name=login> <br>";
        echo "Haslo: <input name=password type=password> <br>";
        echo "<input type=submit value=Zaloguj>";
        echo "</form>";
    }
    ?>
    <a href="main.php">Strona</a>
</body>

</html>