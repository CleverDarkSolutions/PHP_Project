<?php
include 'produkt.php';

session_start();
function login($username, $password, $con)
{
    $loginquery = mysqli_query($con, 'SELECT nazwa, haslo FROM user');
    while ($row = mysqli_fetch_assoc($loginquery)) {
        if ($row['nazwa'] == $username && $row['haslo'] == $password) {
            $_SESSION['user'] = [
                'login' => $username,
                'password' => $password,
                'cart' => array()
            ];
            fetchProducts($con);
        }
    }
}


function fetchProducts($con){ // for everyone
    if(!isset($_SESSION['firstlogin'])){
        $_SESSION['items'] = array();
    }
    $query = mysqli_query($con,'SELECT * FROM PRODUKT');
    echo "<div class=productsCombined>";
    while($row = mysqli_fetch_assoc($query)){

        if(!isset($_SESSION['firstlogin'])){
        $product = new Product($row['id'],$row['nazwa'], $row['cena'], $row['ilosc']);
        array_push($_SESSION['items'], $product);
        }

        echo "<div class=product>";
        echo "<img src=".$row['link']." class=productImg >";
        echo "<h2>".$row['nazwa']."</h4>";
        echo "<h2>".$row['cena']."zł</h4>";
        echo "<h5>Rozmiary: ".$row['rozmiarMin']."-".$row['rozmiarMax']."</h5>";
        echo "<h5>Zostało ".$row['ilosc']." sztuk</h5>";
        if(isset($_SESSION['user'])){
            echo "<a href=addToCart.php?id=".$row['id'].">";
            echo "<button class='btn btn-success'>Zamow</button>";
            echo "</a>";
        }
        echo "</div>";

    }
    echo "</div>";
    $_SESSION['firstlogin'] = 'asdjkdasl';

    var_dump($_SESSION);
}


function logoff(){ // to be expanded
    unset($_SESSION['user']['login']);
    unset($_SESSION['user']['password']);
    session_destroy();
    header('Location: index.php');
}

function loadCart(){
    $items = $_SESSION['items'];
    echo "<table class=table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope=col>ID</th>";
    echo "<th scope=col>Name</th>";
    echo "<th scope=col>Price</th>";
    echo "<th scope=col>Quantity</th>";
    echo "<th scope=col>Size</th>";
    echo "<th scope=col>Image</th>";
    echo "</tr> </thead>";

    for($i=0;$i<count($items);$i++){
        echo "<tr>";
        echo "<th scope=row>".$items[$i]['id']."</th>";
        echo "<td>".$items[$i]['name']."</td>";
        echo "<td>".$items[$i]['price']."</td>";
        echo "<td>".$items[$i]['quantity']."</td>";
        echo "<td>".$items[$i]['size']."</td>";
        echo "<td><img src=".$items[$i]['link']."> </td>";
        echo "</tr>";
    }
    echo "</table>"; 
}

function adminPanelAdd($con){
    echo "<h1>Add</h1>";
    echo "<div class=addProduct>";
    echo "<form method=post>";

    echo "ID: <input type=number name=id> <br>";
    echo "Name: <input name=name> <br>";
    echo "Price: <input type=number name=price> <br>";
    echo "Quantity: <input type=number name=quantity> <br>";
    echo "Size: <input type=number name=size> <br>";
    echo "<input type=submit value=Dodaj>";

    echo "</form>";
    echo "</div>";
    $query = "INSERT INTO produkt VALUES(".$_POST['id'].", '".$_POST['name']." ',".$_POST['price'].", ".$_POST['quantity'].", ".$_POST['size'].")";
    if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['quantity']) && isset($_POST['size']) ){
        mysqli_query($con,$query);
    }
}

function adminPanelModify($con, $which){
    echo "<h1>Modify/h1>";
    echo "<div class=modifyProduct>";
    echo "<form method=post>";

    echo "ID: <input type=number name=id> <br>";
    echo "Price: <input type=number name=price> <br>";
    echo "Quantity: <input type=number name=quantity> <br>";

    echo "<input type=submit value=Zmien>";

    echo "</form>";
    echo "</div>";

    if($which == 'price'){
        $query = "UPDATE produkt SET price=".$_POST['price']."WHERE ID=".$_POST['id'];
        if (isset($_POST['id']) && isset($_POST['price']) ) {
            mysqli_query($con, $query);
    }
    else if($which == 'quantity'){
        $query = "UPDATE produkt SET quantity=".$_POST['quantity']."WHERE ID=".$_POST['id'];
        if(isset($_POST['id']) && isset($_POST['quantity'])){
            mysqli_query($con,$query);
        }
    }
}
}

function addToCart($num){

}
?>