<?php 
$city="kushtiA"; //function weatherData($city)
$url="https://api.wunderground.com/api/API_KEY/conditions/q/BD/".strtolower($city).".json";
$json=file_get_contents($url);
$weatherArray=json_decode($json,true);
//print_r( $weatherArray);
$tem=$weatherArray['current_observation']['temperature_string'];
$location=$weatherArray['current_observation']['display_location']['full'];
$icon=$weatherArray['current_observation']['icon_url'];
$condition=$weatherArray['current_observation']['weather'];
$humidity=$weatherArray['current_observation']['relative_humidity'];
$visibility=$weatherArray['current_observation']['visibility_km']."km";
$wind=$weatherArray['current_observation']['wind_kph']."km/h";

echo "Location: ".$location."<br>";
echo "Temperature: ".$tem."<br>";
echo "Condition: ".$condition."<br>";
echo "Humidity: ".$humidity."<br>";
echo "Visibility: ".$visibility."<br>";
echo "Wind: ".$wind."<br>";
echo '<img style="width:10%; height: auto" src="'.$icon.'">';

?>
