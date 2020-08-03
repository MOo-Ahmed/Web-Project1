<?php 
    require('db.php');
    $car = new Car();
    $car->setAll($_POST["model"], $_POST["brand"], $_POST["price"], $_POST["warranty"]);
    $connection = establishConnection();
    if(!$connection) {
        mysqli_close($connection);
    }

    if($car->getBrand() == null || $car->getModel() == null || $car->getPrice() == null) {
        mysqli_close($connection);
    }
    $brand = $car->getBrand();
    $price = $car->getPrice();
    $model = $car->getModel();
    $warranty = $car->getWarranty();
    $query = "insert into `car`(`brand`, `price`, `model`, `warranty`)
    values('$brand', '$price', '$model','$warranty')";

    $result = mysqli_query($connection, $query);
    if($result) {
        mysqli_close($connection);
    } else {
        mysqli_close($connection);
    }
    $result->free();
    $connection->close();

?>