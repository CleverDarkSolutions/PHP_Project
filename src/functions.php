<?php 

function fetchProducts($con){ // for everyone
    $query = 'SELECT * FROM PRODUKT';

    echo "<div class=productsCombined>";
    while($row = mysqli_fetch_assoc($con,$query)){
        echo "<div class=product>";

        echo "<img src=".$row['link']." class=productimg >";
        echo "<h4>".$row['nazwa']."</hh4>";
        echo "<h4>".$row['cena']."zł</h4>";
        echo "<h2>Rozmiar: ".$row['rozmiar']."</h4>";
        echo "<h2>Zostało ".$row['ilosc']." sztuk</h4>";
        
        echo "</div>";
    }
    echo "</div>";
}

function login($username, $password, $con){
    if( isset($_SESSION['login']) && isset($_SESSION['password']) )
        return 0; 
    else {
        $loginquery = 'SELECT nazwa, haslo FROM user';
        while($row = mysqli_fetch_assoc($con,$loginquery)){
            if($row['nazwa'] == $username && $row['haslo'] == $password){
                $_SESSION['login'] = $username;
                $_SESSION['password'] = $password;
            }
        }
    }
}

function logoff(){ // to be expanded
    $_SESSION[] = [];
    header('Location: index.php');
}

function cart(){
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


?>