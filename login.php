<?php 

include "dbconnection.php";
    
    session_start();
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fetchCitySql = "SELECT * FROM user_table where username='".$username."'";
    $result2 = $conn->query($fetchCitySql);

    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            $dbPassword = $row['password'];
            echo $dbPassword;
            if($dbPassword == $password){
                $_SESSION["name"] = $row['name'];
                header('Location: weather_create.php');
            }
        }
    }
  
  $conn->close(); 


}

?>