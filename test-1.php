<?php


/*
 *
 * СКРИПТ №1
 *
 */
$start = microtime(true);

$array = array();

for ($i = 0; $i < 10000000; $i++) {

    $array[] = rand(0, 100);

}

foreach ($array as $i => $a) {

    if (0 == $a % 2) {

        unset($array[$i]);

    }
}

foreach ($array as $a) {}

$time = microtime(true) - $start;
printf('Скрипт выполнялся %.4F сек.', $time);