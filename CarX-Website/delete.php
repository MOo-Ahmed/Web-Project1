<?php 
    require("Car.php");
    $ID = $_POST["ID"];
    $connection = establishConnection();
    $query = "delete from `Car` where `id` = $ID";
    $result = mysqli_query($connection, $query);
    $connection->close();
?>