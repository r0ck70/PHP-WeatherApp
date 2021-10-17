<?php

  // Including Class AutoLoader
  include 'includes/autoloader.php';

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Current Weather and Forecast Information</title>

    <!-- .//Bootstrap and Custom CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">

    <!-- .//Favicon -->
    <link rel="icon" href="img/weather.png" type="image/gif">
 
  </head>
  <body>
    <div class="container">
      <h1 class="text-center">Search for Weather Info</h1>
      <form action="" method="POST">
        <label class="text-center" for="city">Enter your City</label>
        <input class="form-control" type="text" id="city" name="city" placeholder="Ex. Dhaka" value="<?php if(isset($city)) { echo $city; } ?>" required>
        <div class="text-center">
          <input class="btn btn-primary" type="submit" name="submit" value="CheckOut Now">
        </div>
      </form>
      <?php if(isset($result)) {  ?>
        <div class="alert alert-success" role="alert">
        <?php echo $result; ?>
        </div>
      <?php } ?>
    </div>

    <!-- .//JavaScripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
