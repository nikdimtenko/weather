<?php
require_once 'php/request.php';
require_once 'php/listCity.php';
require_once 'php/db/databaseEntry.php';
require_once 'php/db/redis.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.css">
    <title>Weather</title>
</head>
<body >
    <div class="forms" >
        <form class="text-center" method="get">
            <img class="mb-2" src="/img/sun.png" alt="">
            <h1 class="h3 mb-3 font-weight-normal">Weather</h1>
            <label for="search" class="sr-only">Email address</label>
            <input type="text" id="search" class="form-control" placeholder="Search" autocomplete="off" name="search">
            <button class="btn btn-sm btn-primary " id="button" type="submit" name="request" value="req">Request</button>
            <button class="btn btn-sm btn-primary" id="button" type="submit" name="list" value="list">List</button>
        </form>

    </div>
</form>
    <?php
    if(isset($_GET['request']) || isset($_GET['current']))
        search();
    else if(isset($_GET['list']))
        printList();
    ?>
</body>
</html>