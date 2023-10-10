<?php 
session_start();
if($_SESSION["name"]  == null){
  header('Location: login_view.php');
}
include "dbconnection.php";

$sql = "SELECT wt.weather_id as weather_id, ct.city_name, wt.temprature, wt.wind_speed, wt.wind_direction, wt.precipitation FROM `city_table` ct inner join weather_table wt on wt.city_id = ct.id";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<title>List Of Weather</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="my-custom-css.css">


<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <a href="index3.php" class="logo">Weather App</a>
                <ul class="nav-links">
                <li><a href="weather_create.php">Add Weather</a></li>
                <li><a href="#">List Weather</a></li>
                <li><a href="city_create.php">Add City</a></li>
                <li><a href="city_view.php">List City</a></li>
                <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="toast" id="myToast" data-bs-autohide="false" style="position: absolute; top: 100px; right: 10px;">

        <div class="toast-header">
            <strong class="me-auto"><i class="bi-gift-fill"></i> NOTICE</strong>
            <small>0 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>

        <div class="toast-body">
            Data Successfully Deleted.
        </div>

    </div>

    <main>
        <div class="weather-container">


            <h2>Weather List </h2><br>

            <table class="table" id="table-id">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>City Name</th>

                        <th>Temprature</th>

                        <th>Wind</th>

                        <th>Precipitation</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                        <td><?php echo $row['weather_id']; ?></td>

                        <td><?php echo $row['city_name']; ?></td>

                        <td><?php echo $row['temprature']; ?></td>

                        <td><?php echo $row['wind_speed']. ' ' . $row['wind_direction']; ?></td>

                        <td><?php echo $row['precipitation']; ?></td>

                        <td><a class="btn btn-info"
                                href="weather_update.php?weather_id=<?php echo $row['weather_id']; ?>">Edit</a>&nbsp;<a
                                class="btn btn-danger"
                                href="weather_delete.php?id=<?php echo $row['weather_id']; ?>">Delete</a></td>

                    </tr>

                    <?php       }

            }

        ?>

                </tbody>

            </table>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>&copy; 2023 Weather App</p>
        </div>
    </footer>
</body>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('hasDeleted');
    console.log(myParam);
    $(document).ready(function () {

        if (myParam == 1) {
            setTimeout(function () {
                $("#myToast").toast("show");
            }, 500)

            setTimeout(function () {
                $("#myToast").toast("hide");
            }, 3000)
        }
    });
</script>

</html>