<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            background: #171717;
            color: #fff;
            padding: 2rem;
            width: 40%;
            margin: 4rem auto;
            border-radius: 10px;
        }

        .weather__header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        input {
            border: none;
            background: #1e1e1e;
            outline: none;
            color: #fff;
            padding: 0.5rem 2.5rem;
            border-radius: 5px;
        }

        input::placeholder {
            color: #fff;
        }

        .weather__search {
            position: relative;
        }

        .weather__search i {
            position: absolute;
            left: 10px;
            top: 10px;
            font-size: 15px;
            color: #fff;
        }

        .weather__units {
            font-size: 1.5rem;
        }

        .weather__units span {
            cursor: pointer;
        }

        .weather__units span:first-child {
            margin-right: 0.5rem;
        }

        .weather__body {
            text-align: center;
            margin-top: 3rem;
        }

        .weather__datetime {
            margin-bottom: 2rem;
            font-size: 14px;
        }

        .weather__forecast {
            background: #1e1e1e;
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 30px;
        }

        .weather__icon img {
            width: 100px;
        }

        .weather__temperature {
            font-size: 1.75rem;
        }

        .weather__minmax {
            display: flex;
            justify-content: center;
        }

        .weather__minmax p {
            font-size: 14px;
            margin: 0.5rem;
        }

        .weather__info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 1rem;
            margin-top: 3rem;
        }

        .weather__card {
            display: flex;
            align-items: center;
            background: #1e1e1e;
            padding: 1rem;
            border-radius: 10px;
        }

        .weather__card i {
            font-size: 1.5rem;
            margin-right: 1rem;
        }

        .weather__card p {
            font-size: 14px;
        }

        @media(max-width: 936px) {
            .container {
                width: 90%;
            }

            .weather__header {
                flex-direction: column;
            }

            .weather__units {
                margin-top: 1rem;
            }
        }


        @media(max-width: 400px) {
            .weather__info {
                grid-template-columns: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="weather__header">
            <form class="weather__search">
                <input type="text" id="search" name="city_name" placeholder="Search for a city..." class="weather__searchform">
                <input class='button transparent' id='button' name="submit" type="submit" value='GO' />
                <i class="fa-solid fa-magnifying-glass"></i>
            </form>
            <div class="weather__units">
            </div>
        </div>
<?php
  include "dbconnection.php";

  if (isset($_GET['submit'])) {
    $city_name = $_GET['city_name'];

    $sql = "select wt.*, ct.city_name from weather_table wt inner join city_table ct on ct.id = wt.city_id where LOWER(ct.city_name) LIKE ('%".$city_name."%') ORDER by weather_id DESC LIMIT 1;";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
?>
        <div class="weather__body">
            <h1 class="weather__city"><?php echo $row['city_name'] ;?></h1>
            <div class="weather__datetime"><?php echo $row['for_date'] ;?>
            </div>
            <div class="weather__forecast"></div>
            <div class="weather__icon">
            </div>
            <p class="weather__temperature">
            <?php echo $row['temprature'] ;?>&#176C
            </p>
            <div class="weather__minmax">
                <p><?php echo $row['temprature']-2 ;?>&#176C</p>
                <p><?php echo $row['temprature']+2 ;?>&#176C</p>
            </div>
        </div>

        <div class="weather__info">
            <div class="weather__card">
                <i class="fa-solid fa-temperature-full"></i>
                <div>
                    <p>Real Feel</p>
                    <p class="weather__realfeel"><?php echo $row['temprature'] ;?>&#176C</p>
                </div>
            </div>
            <div class="weather__card">
                <i class="fa-solid fa-droplet"></i>
                <div>
                    <p>Humidity</p>
                    <p class="weather__humidity"><?php echo $row['humidity'] ;?>%</p>
                </div>
            </div>
            <div class="weather__card">
                <i class="fa-solid fa-wind"></i>
                <div>
                    <p>Wind KM/Hr</p>
                    <p class="weather__wind"><?php echo $row['wind_speed'].' '.$row['wind_direction'] ;?></p>
                </div>
            </div>
            <div class="weather__card">
                <i class="fas fa-cloud-showers-heavy"></i>
                <div>
                    <p>Precipitation</p>
                    <p class="weather__pressure"><?php echo $row['precipitation'] ;?></p>
                </div>
            </div>
        </div>
        <?php }}} ?>
    </div>
    <script src="https://kit.fontawesome.com/a692e1c39f.js" crossorigin="anonymous"></script>
    <script src="app.js"></script>
</body>

</html>