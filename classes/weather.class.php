<?php

class Weather {

	// Properties
	private $city;
	private $key;
	private $cityName;
	private $weatherDescription;
	private $countryName;
	private $temperature;
	private $atmPressure;
	private $windSpeed;
	private $cloudsPercentage;
	private $sunsetTime;
	private $sunriseTime;

	public function __construct($city) {
		
		// Intiating Data
		$this->city = $city;
		$this->key  = "ee5a5b8f84f20139882461f32e57acf2";
		date_default_timezone_set("Asia/Dhaka");
	}

	public function getData() {
		// Grabbing Data From API
		$apiData = @file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$this->city."&appid=".$this->key);
		if ($apiData) {
		
			// Converting JSON to ARRAY
			$dataArray = json_decode($apiData, true);

			// Organizing Data
			$this->cityName			= $dataArray['name'];
			$this->weatherDescription = ucwords($dataArray['weather']['0']['description']);
			$this->countryName     = $dataArray['sys']['country'];
			$this->temperature		= intval($dataArray['main']['temp']-273);
			$this->atmPressure		= $dataArray['main']['pressure'];
			$this->windSpeed			= $dataArray['wind']['speed'];
			$this->cloudsPercentage	= $dataArray['clouds']['all'];
			$this->sunsetTime 	    = date('g:i',$dataArray['sys']['sunset']);
			$this->sunriseTime 	    = date('h:i',$dataArray['sys']['sunrise']);

			// Returing Data to Print
			return "<div class='alert alert-success' role='alert'><strong>".$this->cityName.", ".$this->countryName." : ".$this->temperature."&deg;</strong>c<br>
			<strong>Weather Condition: </strong>".$this->weatherDescription."<br>
			<strong>Atmosperic Pressure: </strong>".$this->atmPressure."hPa<br>
			<strong>Wind Speed: </strong>".$this->windSpeed."meter/sec<br>
			<strong>Cloudness: </strong>".$this->cloudsPercentage."%<br>
			<strong>Sunrise: </strong>".$this->sunriseTime."am <strong>Sunset: </strong> ".$this->sunsetTime."pm</div>";
		}
		else {
			return '<div class="alert alert-danger" role="alert">Something went wrong!</div>';
		}
	}

}
