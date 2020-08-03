<?php 
    require("db.php") ;
    $ID = $_POST["ID"] ;
    $car = new Car();
    $car = getCarFromDataBase($ID) ;
    $data = [] ;
    $data["ID"] = $ID ;
    $data["model"] = $car->getModel();
    $data["brand"] = $car->getBrand();
    $data["price"] = $car->getPrice();
    $data["warranty"] = $car->getWarranty();
    echo json_encode($data);
?>