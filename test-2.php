<?php

/*
 *
 * СКРИПТ №2
 *
 */
$start = microtime(true);

class RandArrayIterator extends ArrayIterator
{
    public function current()
    {
        return rand(0, 100);
    }
}

class OddIterator extends FilterIterator
{
    public function accept()
    {
        return 0 == $this->getInnerIterator()->current()%2;
    }
}

$arrayIterator = new ArrayIterator(['']);
$arrayIterator = new RandArrayIterator($arrayIterator);
$arrayIterator = new InfiniteIterator($arrayIterator);
$arrayIterator = new LimitIterator($arrayIterator, 0, 10000000);
$arrayIterator = new OddIterator($arrayIterator);

foreach ($arrayIterator as $a){};

$time = microtime(true) - $start;
printf('Скрипт выполнялся %.4F сек.', $time);