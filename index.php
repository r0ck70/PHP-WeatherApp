<?php

	// Including Class Files
	include 'classes/weather.class.php';
	
	// Set the Default Site Link and Title
    $sitelink = "http://localhost/weather/";
	$title = "Current Weather and Forecast Information";

	// If Data is Submitted
	if(isset($_POST['submit']) AND (!empty($city = $_POST['city']))) {

    // Grabbing Data
    $city = $_POST['city'];
	header('location: '.$sitelink.''.$city.'.html');
  }
  
	if(isset($_GET['city'])){
    // Grabbing Data
    $city = $_GET['city'];
	$title = "Current Weather of ".ucwords($city);

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
    <meta name="keywords" content="weather, forecast">
    <meta name="author" content="Saidul Mursalin: fb/itzmonir">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content= "width=device-width, user-scalable=no">

    <meta property="og:url" content="<?php echo $sitelink; ?>" />
    <meta property="og:title" content="Current Weather and Forecast Information" />
    <meta property="og:description" content="Get current weather and forecast information for free." />
    <meta property="og:image" content="<?php echo $sitelink; ?>img/weather_ogp_img.jpg" />
    
    <title><?php echo $title; ?></title>

    <!-- .//Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $sitelink; ?>css/app.css" rel="stylesheet">

    <!-- .//Favicon -->
    <link rel="icon" href="<?php echo $sitelink; ?>img/weather.png" type="image/gif">
 
  </head>
  <body>
    <div class="container">
      <a href="<?php echo $sitelink; ?>"><h1 class="text-center">Search for Weather Info</h1></a>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

  </body>
</html>


