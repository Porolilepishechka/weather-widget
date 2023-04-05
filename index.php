<?php
 require("header.html")
?>

<?php

 $url = "https://api.openweathermap.org/data/2.5/weather";
 $options = array(
    'id' => 706369,
    'APPID' => 'f4a1d82f0ac16a971f10a3017ebe86c5',
    'units' => 'metric',
    'lang' => 'en',
 );

 $ch = curl_init();
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_URL, $url.'?'.http_build_query($options));

 $response = curl_exec($ch);
 $data = json_decode($response, true);

 curl_close($ch);

 if($data['weather']['0']['main'] == 'Clouds'){
  $weather = "weather-clouds.jpg";
  echo '<div class="img-weather"><img src='. $weather. '></div>';
 }
 else if($data['weather']['0']['main'] == 'Rain'){
  $weather = "weather-rain.jpg";
  echo '<div class="img-weather"><img src='. $weather. '></div>';
 }
 else if($data['weather']['0']['main'] == 'Sun'){
  $weather = "weather-sun.jpg";
  echo '<div class="img-weather"><img src='. $weather. '></div>';
 }
 else if($data['weather']['0']['main'] == 'Snow'){
  $weather = "weather-Snow.jpg";
  echo '<div class="img-weather"><img src='. $weather. '></div>';
 }
 else if($data['weather']['0']['main'] == 'Thunderstorm'){
  $weather = "weather-thunderstorm.jpg";
  echo '<div class="img-weather"><img src='. $weather. '></div>';
 }

 $temp = array_slice($data, 3, true);
 echo '<h2>'.'°C '.$temp['main']['temp'].'</h2>';
 echo '<h2>'.'Feels_like: °C '.$data['main']['feels_like'].'</h2>';
 echo '<h2>'.'wind speed: '.$data['wind']['speed'].' m/s'.'</h2>';
 echo '<h2>'.'weather: '.$data['weather']['0']['main'].'</h2>';
 echo '<h2>'.'description: '.$data['weather']['0']['description'].'</h2>';
?>

<?php
  require("footer.html")
?>
