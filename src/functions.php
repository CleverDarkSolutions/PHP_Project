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

?>