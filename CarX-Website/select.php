<?php 
    require ('Car.php');
    $connection = establishConnection();
    $query = "SELECT id , model FROM car";
    $result = mysqli_query($connection, $query);

    echo '<div  class="table-responsive">  
    <table id="crudTable" class="table table-dark">
        <tr>
            <th> ID </th>
            <th> Model </th>
            <th></th>
            <th></th>
            <th></th>
        </tr>';

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ID = $row["id"];
            $model = $row["model"];                
            echo '<tr><td>'.$ID;
            echo "<td>".$model ;

            echo "<td><form method='POST'>";
            echo "<input type='hidden' name='ID' value=". $ID . ">";
            echo "<input type='submit' data-id1=".$ID." class = 'btn btn-md btn-light btn_view' value='View'>";
            echo "</form>";

            echo "<td><form method='POST'>";
            echo "<input type='hidden' name='ID' value=". $ID . ">";
            echo "<input type='submit' data-id2=".$ID." class='btn btn-md btn-warning btn_update' value='Update'>";
            echo "</form>";

            echo "<td><form method='POST'>";
            echo "<input type='hidden' name='ID' value=". $ID . ">";
            echo "<input type='submit' data-id3=".$ID." class='btn btn-md btn-danger btn_delete' value='Delete'>";
            echo "</form>";
            echo '</tr>';

        }
        echo '</table></div>' ;
        $result->free();
    } 
    else {
        echo ("0 result") ;
    }
    $connection->close();
 
?>