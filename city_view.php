<?php 
session_start();
if($_SESSION["name"]  == null){
  header('Location: login_view.php');
}
include "dbconnection.php";

$sql = "SELECT ct.id, ct.city_name, ct.longitude, ct.latitude FROM city_table ct";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<title>List Of City</title>

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
                <li><a href="weather_view1.php">List Weather</a></li>
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

    <div class="toast" id="myToast1" data-bs-autohide="false" style="position: absolute; top: 100px; right: 10px;">

        <div class="toast-header" style="background-color: red;">
            <strong class="me-auto"><i class="bi-gift-fill"></i> WARNING...!!</strong>
            <small>0 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>

        <div class="toast-body">
            Data can't be Deleted due to foreign constrant.
        </div>

    </div>

    <main>
        <div class="weather-container">


            <h2>City List </h2><br>

            <table class="table">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>City Name</th>

                        <th>Longitude</th>

                        <th>Latitude</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                        <td><?php echo $row['id']; ?></td>

                        <td><?php echo $row['city_name']; ?></td>

                        <td><?php echo $row['longitude']; ?></td>

                        <td><?php echo $row['latitude']; ?></td>

                        <td><a class="btn btn-info"
                                href="city_update.php?city_id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a
                                class="btn btn-danger"
                                href="city_delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>

                    </tr>

                    <?php       }

            }
            $result->close(); $conn->close();

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
        else if (myParam == 0) {
            setTimeout(function () {
                $("#myToast1").toast("show");
            }, 500)

            setTimeout(function () {
                $("#myToast1").toast("hide");
            }, 3000)
        }
    });
</script>

</html>