<?php
function entry_city($city, $country, $temp, $description, $clouds, $pressure, $wind, $icon) {
    require_once 'dbConnection.php';

    mysqli_query($connection, "INSERT INTO `citys_history` (`id`, `city_name`, `country`, `temp`, `description`,
                                                                  `clouds`, `pressure`, `wind`, `icon`, `request_date`) 
                                     VALUES (NULL,'$city','$country','$temp','$description','$clouds','$pressure','$wind','$icon', CURRENT_TIMESTAMP)");
    close_connection($connection);
}