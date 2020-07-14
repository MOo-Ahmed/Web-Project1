<!DOCTYPE html>   
<html>
<head>
    <title>CarX Store | Update car form</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <script src="myScript.js"></script>
</head>

<body class="container-fluid">
    <div id="MainDiv" class="container">
           <form  method="post" name="newCar" action="UpdateCar.php"
                 class="myForm"  target="_self">
                <h1 class="siteName"><a class="navLink" href="#">CarX</a></h1>
                <div class="form-group">
                <?php 
                    require_once('Car.php');
                    $car = new Car();
                    $car = getCarFromDataBase($_POST["ID"]);
                    $ID = $_POST["ID"];
                    echo '<input name="ID" type="hidden" value="'.$ID.'">';
                    $model = $car->getModel() ;
                    echo '<label for="i1" class="Label">Car Model</label> 
                    <input id = "i1" name="model" class="form-control mt-sm-1 mb-3 mr-sm-2" type="text" 
                    value="'.$model.'" autofocus>';
                
                echo '</div>';
                echo '<div class="form-group">';
                 
                    //require_once('Car.php');
                    //$car = new Car();
                    //$car = getCarFromDataBase($_POST["ID"]);
                    $brand = $car->getBrand() ;
                    echo '<label class="Label">Car Brand</label>
                    <input placeholder="Car brand name" name="brand" class="form-control mb-3 mr-sm-2" type="text" value="'.$brand.'" required>';
                
                echo '</div>';
                echo '<div class="form-group">';
                 
                    //require_once('Car.php');
                    //$car = new Car();
                    //$car = getCarFromDataBase($_POST["ID"]);
                    $price = $car->getPrice() ;
                    echo '<label class="Label">Car price</label>
                    <input placeholder="Car price"  name="price" class="form-control mb-4 mr-sm-2" type="text" value="'.$price.'" required>';
                
                    
                echo '</div>';
                echo '<div class="form-group">';
                 
                    //require_once('Car.php');
                    //$car = new Car();
                    //$car = getCarFromDataBase($_POST["ID"]);
                    $war = $car->getWarranty() ;
                    echo '<label class="Label">Car years of warranty</label>
                    <input placeholder="Years of Warranty"  name="warranty" class="form-control mb-3 mr-sm-2" type="text" value="'.$war.'" required>';
                ?>
                </div>
                <input type="reset" value="Reset" class="btn btn-sm btn-dark mb-2" >
                <input type="submit" value="Confirm" class="btn btn-success btn-block mb-8 mlsm-4 mrsm-4">
           </form>
    </div>
</body>
</html> 