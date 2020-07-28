<?php 
    class Car {
        private $ID;
        private $model;
        private $brand;
        private $warranty;
        private $price;


        function setAll($model, $brand, $price, $warranty) {
            $this->model = $model;
            $this->brand = $brand;
            $this->price = $price;
            $this->warranty = $warranty;
        }
        function setID($ID) {
            $this->ID = $ID;
        }
        function setModel($model) {
            $this->model = $model;
        }
        function setBrand($brand) {
            $this->brand = $brand;
        }
        function setPrice($price) {
            $this->price = $price;
        }
        function setWarranty($warranty) {
            $this->warranty = $warranty;
        }
        
        function getID() {
            return $this->ID;
        }
        function getBrand() {
            return $this->brand;
        }
        function getModel() {
            return $this->model;
        }
        function getWarranty() {
            return $this->warranty;
        }
        function getPrice() {
            return $this->price;
        }
        function print() {
            echo $this->ID . " " . $this->model . " " . $this->brand . " " . $this->price . " " . $this->warranty . "<br>";
        }
    }    

    class User{
        private $id ;
        private $name ;
        private $email ;
        private $password ;
        
    }

    function establishConnection() {
        define("SERVER_LOCATION", "localhost");
        define("USER_NAME", "root");
        define("PASSWORD", '');
        define("DATABASE_NAME", "Carstore");

        return mysqli_connect(SERVER_LOCATION, USER_NAME, PASSWORD, DATABASE_NAME);
    }

    function getCarFromDataBase($ID) {
        $connection = establishConnection();
        $query = "select * from `Car` where `id` = $ID";
        $result = mysqli_query($connection, $query);
        $car = new Car();
        while($row = mysqli_fetch_assoc($result)) {
            $car->setID($row["id"]);
            $car->setAll($row["model"], $row["brand"], $row["price"], $row["warranty"]);
        }
        $result->free();
        $connection->close();
        return $car;
    }

    function saveCarToDataBase($car) {
        $connection = establishConnection();
        if(!$connection) {
            //$returnMessage = "Can't connect to server.";
            mysqli_close($connection);
            header("Location: NewCarForm.html");
        }

        if($car->getBrand() == null || $car->getModel() == null || $car->getPrice() == null) {
            //$returnMessage = "One of the required inputs is null";
            mysqli_close($connection);
            header("Location: NewCarForm.html");
        }
        $brand = $car->getBrand();
        $price = $car->getPrice();
        $model = $car->getModel();
        $warranty = $car->getWarranty();
        $query = "insert into `car`(`brand`, `price`, `model`, `warranty`)
        values('$brand', '$price', '$model','$warranty')";

        $result = mysqli_query($connection, $query);
        if($result) {
            //$returnMessage = "Insertion Succeed.";
            mysqli_close($connection);
            //header("Location: Main.php");
        } else {
            //$returnMessage = "Insertion Failed.";
            mysqli_close($connection);
            //header("Location: NewCarForm.html");
        }
        $result->free();
        $connection->close();
    }

    function selectAllCarsFromDataBase(){
        $connection = establishConnection();
        $query = "SELECT * FROM car";
        $result = mysqli_query($connection, $query);
        
        echo '
        <table class="table table-dark">
			<tr>
				<th> ID </th>
				<th> Brand </th>
				<th> Model </th>
				<th> Price </th>
				<th> Warranty </th>
            </tr>';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ID = $row["id"];
                $brand = $row["brand"];
                $model = $row["model"];
                $warranty = $row["warranty"];
                $price = $row["price"]; 


                echo '
                <tr> 
            <td>'.$ID.'</td> 
            <td>'.$brand.'</td> 
            <td>'.$model.'</td> 
            <td>'.$price.'</td> 
            <td>'.$warranty.'</td> 
            </tr>

            ';

            }
            echo '</table>' ;
           $result->free();
        } 
        else {
            echo ("0 result") ;
        }
         $connection->close();
    } 

    function updateCarInDataBase($car) {
        $connection = establishConnection();
        if(!$connection) {
            //$returnMessage = "Can't connect to server.";
            mysqli_close($connection);
            //header("Location: UpdateCarForm.php");
        }

        if($car->getBrand() == null || $car->getModel() == null || $car->getPrice() == null) {
            //$returnMessage = "One of the required inputs is null";
            mysqli_close($connection);
            //header("Location: UpdateCarForm.php");
        }
        $ID = $car->getID();
        $brand = $car->getBrand();
        $price = $car->getPrice();
        $model = $car->getModel();
        $warranty = $car->getWarranty();
        $query = "update `car` set `brand` = '$brand', `price` = '$price', `model` = '$model',
        `warranty`= '$warranty' where id = '$ID'";

        $result = mysqli_query($connection, $query);
        if($result) {
            //$returnMessage = "Insertion Succeed.";
            mysqli_close($connection);
            //header("Location: Main.php");
        } else {
            //$returnMessage = "Insertion Failed.";
            mysqli_close($connection);
            //header("Location: UpdateCarForm.php");
        }
        $result->free();
        $connection->close();
    }

	
?>