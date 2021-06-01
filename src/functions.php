<?php
include 'produkt.php';

session_start();

function reloadSession(){
    session_destroy();
}

function landingpage(){
    echo " <nav class='navbar navbar-light bg-light justify-content-center'>";
    echo    "<span class='logo navbar-brand mb-0 h1'><a href='main.php'>Pablo Sabre International</a></span>";
    echo    "<span class='navbar-brand mb-0 h1'><a href='main.php'>Sklep</a></span>";
    if(isset($_SESSION['user'])){
        echo "<span class='navbar-brand mb-0 h1'><a href='cart.php'>Koszyk</a></span>";
        echo "<span class='navbar-brand mb-0 h1'><a href='#'>Konto</a></span>";
    }
    echo        "<span class='navbar-brand mb-0 h1'>Twórca</span>";
    echo        "<span class='navbar-brand mb-0 h1 username'>"; 
                if(isset($_SESSION['user']['login']))
                    echo "Zalogowany jako: ".($_SESSION['user']['login']); 
    echo        "</span>";
    echo        "<span class='navbar-brand mb-0 h1'>";
                if(isset($_SESSION['user']['login']))
                    echo "<a href=main.php?logoff=true>Wyloguj</a></span>";
                else {
                    echo "<span class=navbar-brand mb-0 h1><a href=index.php>Zaloguj</a></span>";
                }
    echo        "</nav>";
}

function login($username, $password, $con)
{
    $loginquery = mysqli_query($con, 'SELECT nazwa, haslo FROM user');
    while ($row = mysqli_fetch_assoc($loginquery)) {
        if ($row['nazwa'] == $username && $row['haslo'] == $password) 
                echo "huj";
                 $_SESSION['user'] = [
                    'login' => $username,
                    'password' => $password,
                    'cart' => $_SESSION['user']['cart']
                ];
            }
    if ($_SESSION['user']['cart'] == NULL)
        $_SESSION['user']['cart'] = array();
            fetchProducts($con);
        }
    



function fetchProducts($con){ // for everyone
    var_dump($_SESSION['user']);
    if(!isset($_SESSION['firstlogin'])){
        $_SESSION['items'] = array();
        $_SESSION['itemCount'] = 0;
    }
    $query = mysqli_query($con,'SELECT * FROM PRODUKT');
    echo "<div class=productsCombined>";
    while($row = mysqli_fetch_assoc($query)){

        if(!isset($_SESSION['firstlogin'])){
        $product = new Product($row['id'],$row['nazwa'], $row['cena'], $row['ilosc'], $row['link']);
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
            echo "<button class='btn btn-outline-secondary'>Dodaj do koszyka</button>";
            echo "</a>";
        }
        echo "</div>";

    }
    echo "</div>";
    $_SESSION['firstlogin'] = 'asdjkdasl';

}


function logoff(){ // to be expanded
    unset($_SESSION['user']['login']);
    unset($_SESSION['user']['password']);
    header('Location: index.php');
}

function loadCart(){
    echo "<table class='table table1'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope=col>ID</th>";
    echo "<th scope=col>Name</th>";
    echo "<th scope=col>Price</th>";
    //echo "<th scope=col>Quantity</th>";
    echo "<th scope=col>Image</th>";
    echo "<th scope=col>Delete</th>";
    echo "</tr> </thead>";

    for($i=0;$i<intval($_SESSION['itemCount']);$i++){
        if(isset($_SESSION['user']['cart'][$i] )){
        echo "<tr>";
        echo "<th scope=row>".$_SESSION['user']['cart'][$i] -> getId()."</th>";
        echo "<td>". $_SESSION['user']['cart'][$i]->getName()."</td>";
        echo "<td>". $_SESSION['user']['cart'][$i]->getPrice()." zł</td>";
        //echo "<td>". $_SESSION['user']['cart'][$i]->getStoreQuantity()."</td>";
        echo "<td><img class=smallimg src=". $_SESSION['user']['cart'][$i]->getImage()."> </td>";
        echo "<td><a href=deleteElement.php?index=".$i.">";
        echo "<button class='btn btn-danger'>X</button>";
        echo "</a></td>";
        echo "</tr>";
        }
    }
    echo "</table>"; 
    if(count($_SESSION['user']['cart'])>0) {
        echo "<button class=' payButton btn btn-outline-secondary'>Płace i zamawiam</button>";
    }
}

function deleteItem($i){
    \array_splice($_SESSION['user']['cart'],$i,1);
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
    var_dump($num);
    var_dump($_SESSION['items'][0]);
    array_push($_SESSION['user']['cart'],$_SESSION['items'][$num-1]);

    var_dump($_SESSION['user']['cart']);
}
