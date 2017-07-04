<?php
if(isset($_REQUEST["confirm"])){
    if(isset($_REQUEST["sport"])){
        $sport = $_REQUEST["sport"];
        echo "<h3>Your Favorite Sports Are:</h3>";
        echo "<ol>";
        foreach($sport as $s){
            echo "<li style='text-transform:capitalize;'>". $s . "</li>";
        }
        echo "</ol>";
    }
    echo "<br />";
    if(isset($_REQUEST["car"])){
        $car = $_REQUEST["car"];
        echo "<h3>Your Favorite Cars Are:</h3>";
        echo "<ol>";
        foreach($car as $c){
            echo "<li style='text-transform:capitalize;'>". $c . "</li>";
        }
        echo "</ol>";
    }
}
else{
    echo "<p>Please confirm your selection.</p>";
}
?>