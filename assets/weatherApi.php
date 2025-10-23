<?php
$apiKey = "YOUR_API_KEY";
$city = "London";
$url = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

$response = file_get_contents($url);
$data = json_decode($response, true);

echo "City: {$data['name']}<br>";
echo "Temperature: {$data['main']['temp']}°C<br>";
echo "Condition: {$data['weather'][0]['description']}";
?>