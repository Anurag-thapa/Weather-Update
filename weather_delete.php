<?php 

include "dbconnection.php"; 

if (isset($_GET['id'])) {

    $weather_id = $_GET['id'];

    $sql = "DELETE FROM weather_table WHERE weather_id=".$weather_id;

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }
    header('Location: weather_view1.php?hasDeleted=1');
    die();
} 

?>