<?php 

function fetchProducts($con){
    
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
}

?>