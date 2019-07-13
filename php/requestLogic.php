<?php
$redis = redisConnect();

if ($_GET['search'] == "" && $_GET['current'] == "") {
    echo '<div class="warn" align="center">Please, input city.</div>';
    exit();
}
else {
    // если запрос пришел с кнопки списка ранее вводимых городов
    if($_GET['current']) {
        // если город был в redis, то $responce будет получен из кэша
        $responce = checkInRedis($_GET['current'], $redis);
        // если города не было в redis, то $responce будет получен из запроса к сайту погоды
        if (!$responce) {
            $state_url = 'https://api.openweathermap.org/data/2.5/weather?q=' . $_GET['current'] . '&appid=e7499d9771936cf357884cb4f0080352';
            $responce = file_get_contents($state_url);
        }
    }
    else {
        // если запрос пришел с кнопки поиска
        $responce = checkInRedis($_GET['search'], $redis);
        if (!$responce) {
            $state_url = 'https://api.openweathermap.org/data/2.5/weather?q=' . $_GET['search'] . '&appid=e7499d9771936cf357884cb4f0080352';
            $responce = file_get_contents($state_url);
        }
    }
}
$dates = json_decode($responce);

$city = $dates->name;
$country = $dates->sys->country;
$temp = $temp = round($dates->main->temp - KELVIN);
$description = $dates->weather[0]->description;
$clouds = $dates->clouds->all;
$pressure = $dates->main->pressure;
$wind = $dates->wind->speed;
$png = IMAGE_COUNTRY . mb_strtolower($country) . '.png';
$icon = IMAGE_ICON . $dates->weather[0]->icon . '.png';

