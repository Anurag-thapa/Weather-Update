<?php 

include "dbconnection.php"; 

if (isset($_GET['id'])) {
    try{
    $id = $_GET['id'];

    $sql = "DELETE FROM city_table WHERE id=".$id;

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }
    header('Location: city_view.php?hasDeleted=1');
    }
    catch (Exception $e){
        header('Location: city_view.php?hasDeleted=0');
    }
    die();
} 

?>