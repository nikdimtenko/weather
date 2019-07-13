<?php

define("KELVIN", 273.15);
define("IMAGE_COUNTRY", "http://openweathermap.org/images/flags/");
define("IMAGE_ICON", "http://openweathermap.org/img/w/");

function search()
{
    require_once 'requestLogic.php';
?>
        <div class ="correct cityInform" align="center">
            <img src=<?php echo $icon ?> width="65" height="65"style="margin-bottom: -3%">
            <small class="text-muted"><?php echo '</br>' . $description ?></small>
            <h1  style="margin-bottom: -1%;" "><?php echo $temp ?>°C</h1>
            <h4 > <?php echo $city . ', ' . $country?> <img src=<?php echo $png ?> width="25" height="18"></h4>
            <h5>wind <?php echo $wind ?> m/s, clouds <?php echo $clouds ?>%, <?php echo $pressure ?> hpa </h5>
        </div>
<?php
    //запись в базу данных
    entry_city($city, $country, $temp, $description, $clouds, $pressure, $wind, $dates->weather[0]->icon);

    // Если города нет в redis, то записываем его туда
    if(!checkInRedis($city, $redis))
        addToRedis($city, $responce, $redis);
}
