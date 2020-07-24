<?php 
    require('Car.php');
    $ID = $_POST["ID"];
    $car = getCarFromDataBase($ID);
    echo '
    <table class="table table-dark">
        <tr>
            <th> ID </th>
            <th> Brand </th>
            <th> Model </th>
            <th> Price </th>
            <th> Warranty </th>
        </tr>';

        $ID = $car->getID();
        $brand = $car->getBrand();
        $model = $car->getModel();
        $warranty = $car->getWarranty();
        $price = $car->getPrice(); 

        echo '
        <tr> 
            <td>'.$ID.'</td> 
            <td>'.$brand.'</td> 
            <td>'.$model.'</td> 
            <td>'.$price.'</td> 
            <td>'.$warranty.'</td> 
        </tr>';
    echo '</table>' ;
?>