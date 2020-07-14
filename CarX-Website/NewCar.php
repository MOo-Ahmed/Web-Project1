    <?php
        require('Car.php');
        $car = new Car();
        $car->setAll($_POST["model"], $_POST["brand"], $_POST["price"], $_POST["warranty"]);
        echo 'Waiting ......' ;
        //$car->print();
        saveCarToDataBase($car);
        
    ?>
    