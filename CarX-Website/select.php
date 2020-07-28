<?php 
    require ('Car.php');
    $connection = establishConnection();
    $query = "SELECT id , model FROM car";
    $result = mysqli_query($connection, $query);
    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
			$data[] = $row;
        }
        $result->free();
    } 
    else {
        echo ("0 result") ;
    }
    $connection->close();
    echo json_encode($data); 
?>