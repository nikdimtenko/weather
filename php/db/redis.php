<?php

function redisConnect() {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    return $redis;
}

/* Проверяет есть ли город(совпадающий с ключом $city) в хранилище redis
* Если нет, возвращает false
* Иначе возвращает данные по ключу*/
function checkInRedis($city, $redis) {
    if(empty($redis->keys($city)))
        return false;
    return $redis->get($city);
}

function addToRedis( $city, $dates, $redis) {
    $redis->set($city, $dates, 1800);
}