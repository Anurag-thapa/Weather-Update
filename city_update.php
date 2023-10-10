<html>


<?php 
session_start();
if($_SESSION["name"]  == null){
  header('Location: login_view.php');
}

include "dbconnection.php";

if (isset($_POST['update'])) {

  $city_name = $_POST['city_name'];

  $longitude = $_POST['longitude'];

  $latitude = $_POST['latitude'];

  $city_id = $_POST['city_id'];

  $preparedStm = $conn->prepare("UPDATE city_table set city_name = ?,  longitude = ?, latitude = ? where id = ? ;");
  $preparedStm->bind_param("sssi", $city_name, $longitude, $latitude, $city_id);
  $result = $preparedStm->execute();

  if ($result == TRUE) {

    echo "<script>
    $(document).ready(function(){
      var su = 0;
      if(su === 0){
      setTimeout(function (){
        $(\"#myToast\").toast(\"show\");
      }, 500)
    
      setTimeout(function (){
        $(\"#myToast\").toast(\"hide\");
      }, 3000)
      }
    });
    </script>";
   // $preparedStm->close();
  }else{

    echo "Error:". $sql . "<br>". $conn->error;

  }  
}

  if (isset($_GET['city_id'])) {

    $city_id = $_GET['city_id']; 

    $sql = "SELECT * FROM city_table WHERE id=".$city_id;

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

        $city_id = $row['id'];

        $city_name = $row['city_name'];
    
        $longitude = $row['longitude'];
    
        $latitude = $row['latitude'];


//   $fetchCitySql = 'SELECT * FROM city_table';
//   $result2 = $conn->query($fetchCitySql);
//   $conn->close(); 
?>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Lato', 'Arial', sans-serif;
  }

  /* HEADINGS */

  h1,
  p {
    color: #fff;
    text-align: center;
    line-height: 1.4;
  }

  h1 {
    font-size: 2.2rem;
  }

  h2 {
    color: #000;
    font-size: 1.3rem;
    text-align: center;
    line-height: 1.4;
    margin-bottom: 10px;
  }


  .formbold-mb-5 {
    margin-bottom: 20px;
  }

  .formbold-pt-3 {
    padding-top: 12px;
  }

  .formbold-main-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px;
  }

  .formbold-form-wrapper {
    padding: 20px 20px 20px 20px;
    margin: 0 auto;
    max-width: 800px;
    width: 100%;
    background: white;
  }

  .formbold-form-label {
    display: block;
    font-weight: 500;
    font-size: 16px;
    color: #07074d;
    margin-bottom: 12px;
  }

  .formbold-form-label-2 {
    font-weight: 600;
    font-size: 20px;
    margin-bottom: 20px;
  }

  .formbold-form-input {
    width: 100%;
    padding: 12px 24px;
    border-radius: 6px;
    border: 1px solid #e0e0e0;
    background: white;
    font-weight: 500;
    font-size: 16px;
    color: #6b7280;
    outline: none;
    resize: none;
  }

  .formbold-form-input:focus {
    border-color: #6a64f1;
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }

  .formbold-btn {
    text-align: center;
    font-size: 16px;
    border-radius: 6px;
    padding: 14px 32px;
    border: none;
    font-weight: 600;
    background-color: #6a64f1;
    color: white;
    cursor: pointer;
  }

  .formbold-btn:hover {
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }

  .formbold--mx-3 {
    margin-left: -12px;
    margin-right: -12px;
  }

  .formbold-px-3 {
    padding-left: 12px;
    padding-right: 12px;
  }

  .flex {
    display: flex;
  }

  .flex-wrap {
    flex-wrap: wrap;
  }

  .w-full {
    width: 100%;
  }

  .formbold-radio {
    width: 20px;
    height: 20px;
  }

  .formbold-radio-label {
    font-weight: 500;
    font-size: 16px;
    padding-left: 12px;
    color: #070707;
    padding-right: 20px;
  }

  @media (min-width: 540px) {
    .sm\:w-half {
      width: 50%;
    }
  }

  body {
    min-width: 800px;
    background: #7dc6f0;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #bde5f8, #88daee);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #b9b0e6, #73c2f7);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    margin: 0px;
  }
</style>
<title>Update City</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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

  <main>
    <div class="weather-container">
      <div class="page-wrapper">

        <div class="formbold-main-wrapper">
          <div class="formbold-form-wrapper">
            <form action="" method="POST">
            <input type="hidden"  name="city_id" id="temprature" placeholder="City Name" value="<?php echo $city_id; ?>"/>
              <div class="flex flex-wrap formbold--mx-3">
                <div class="w-full sm:w-half formbold-px-3">
                  <div class="formbold-mb-5">
                    <label for="city_name" class="formbold-form-label"> City Name </label>
                    <input type="text" name="city_name" id="temprature" placeholder="City Name" value="<?php echo $city_name; ?>"
                      class="formbold-form-input" />
                  </div>
                </div>
              </div>
              <div class="flex flex-wrap formbold--mx-3">
                <div class="w-full sm:w-half formbold-px-3">
                  <div class="formbold-mb-5">
                    <label for="longitude" class="formbold-form-label">Longitude </label>
                    <input type="number" step="0.01" name="longitude" id="wind_speed" placeholder="00000.00" value="<?php echo $longitude; ?>"
                      class="formbold-form-input" />
                  </div>
                </div>
                <div class="w-full sm:w-half formbold-px-3">
                  <div class="formbold-mb-5">
                    <label for="longitude" class="formbold-form-label">Longitude </label>
                    <input type="number" step="0.01" name="latitude" id="wind_speed" placeholder="00000.00" value="<?php echo $latitude; ?>"
                      class="formbold-form-input" />
                  </div>
                </div>
              </div>
              <div>
                <input class="formbold-btn" type="submit" name="update" value="update">
                <!-- <button class="formbold-btn">Submit</button> -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
  $preparedStm->close();
  $conn->close();
        }
    }}
  ?>
  <footer>
    <div class="container">
      <p>&copy; 2023 Weather App</p>
    </div>
  </footer>
</body>
<script>
  $("#search-icon").click(function () {
    $(".nav").toggleClass("search");
    $(".nav").toggleClass("no-search");
    $(".search-input").toggleClass("search-active");
  });

 $('.menu-toggle').click(function () {
    $(".nav").toggleClass("mobile-nav");
    $(this).toggleClass("is-active");
  }); 
</script>

</html>