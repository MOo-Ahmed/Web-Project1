    <?php
        require('db.php');
        $car = new Car();
        $car->setAll($_POST["model"], $_POST["brand"], $_POST["price"], $_POST["warranty"]);
        //echo 'Waiting ......' ;
        saveCarToDataBase($car);
        sleep(2);
        selectSampleDataFromDataBase();
        //sleep(2);
    ?>
    