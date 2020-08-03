    <?php
        require('db.php');
        $car = new Car();
        $car->setID($_POST["ID"]);
        $car->setAll($_POST["model"], $_POST["brand"], $_POST["price"], $_POST["warranty"]);
        echo 'Waiting ......' ;
        //$car->print();
        updateCarInDataBase($car);
        
    ?>
    