<?php
$host = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'openwaether_db';

$connection = mysqli_connect($host, $user, $password, $database);

if($connection == false) {
    echo mysqli_connect_error();
    exit();
}

function close_connection($connection){
    mysqli_close($connection);
}

