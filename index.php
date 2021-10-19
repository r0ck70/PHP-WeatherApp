<?php

  // Including Class Files
  include 'classes/weather.class.php';

  // If Data is Submitted
  if(isset($_POST['submit']) AND (!empty($city = $_POST['city']))) {

    // Grabbing Data
    $city = $_POST['city'];

    // Object and Methods
    $weatherData = new Weather($city);
    $result = $weatherData->getData();
  }

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Get current weather and forecast information for free.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content= "width=device-width, user-scalable=no">

    
    <title>Current Weather and Forecast Information</title>

    <!-- .//Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">

    <!-- .//Favicon -->
    <link rel="icon" href="img/weather.png" type="image/gif">
 
  </head>
  <body>
    <div class="container">
      <a href=""><h1 class="text-center">Search for Weather Info</h1></a>
      <form action="" method="POST">
        <label class="text-center" for="city">Enter your City</label>
        <input class="form-control" type="text" id="city" name="city" placeholder="Ex. Dhaka or Jamalpur, BD" value="<?php if(isset($city)) { echo $city; } ?>" required>
        <div class="text-center">
          <input class="btn btn-primary" type="submit" name="submit" value="CheckOut Now">
        </div>
      </form>
      <?php if(isset($result)) {  ?>
        <?php echo $result; ?>
        </div>
      <?php } ?>
    </div>

    <!-- .//JavaScripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


