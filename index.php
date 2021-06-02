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
    //Get Heroku ClearDB connection information
    $cleardb_url = parse_url(getenv("mysql://b8037eebd25c3c:a17473d7@eu-cdbr-west-01.cleardb.com/heroku_f5b528b5400594f?reconnect=true"));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"], 1);
    $active_group = 'default';
    $query_builder = TRUE;
    // Connect to DB
    $con = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

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