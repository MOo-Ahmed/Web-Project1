<?php
    require("Car.php") ;
    $ID = $_POST["ID"] ;
    $car = new Car();
    //echo $ID ;
    $car = getCarFromDataBase($ID) ;    
    echo '
    <form id="shortForm" method="post" name="newCar" target="_self">
        <div class="form-group">
            <input  value='.$car->getModel().' name="model" class="form-control mt-sm-5 mb-3 mr-sm-2" type="text" autofocus required id = "model">
        </div>
        <div class="form-group">
            <input value='.$car->getBrand().' name="brand" class="form-control mb-3 mr-sm-2" type="text" 
            required id = "brand">
        </div>
        <div class="form-group">
            <input value='.$car->getPrice().' name="price" class="form-control mb-4 mr-sm-2" type="text" 
            required id = "price">
        </div>
        <div class="form-group">
            <input value='.$car->getWarranty().' name="warranty" class="form-control mb-3 mr-sm-2" type="text" 
            required id = "warranty">
        </div>
        <input type="reset" value="Reset" class="btn btn-sm btn-warning mb-2" >
        <input type="submit" id="submitUpdateBtn" value="update"  class="btn btn-info btn-block mb-5 mlsm-4 mrsm-4">
    </form> ' ;


?>