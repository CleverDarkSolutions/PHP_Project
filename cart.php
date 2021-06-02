<?php
include 'functions.php';
$ //Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("mysql://b8037eebd25c3c:a17473d7@eu-cdbr-west-01.cleardb.com/heroku_f5b528b5400594f?reconnect=true"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$con = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

if(!isset($_SESSION['user']['login']))
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


            <?php
            landingpage();
            loadCart();

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