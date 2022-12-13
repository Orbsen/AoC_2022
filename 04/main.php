<?php
$rows = file('input_04.txt');

getOverlapCounter($rows);
echo '<br />';

function getOverlapCounter($rows): void
{
    $count1 = 0;
    $count2 = 0;
    foreach ($rows as $row) {
        $numbers = preg_split('/[-,]/', $row);
        $firstRange = range($numbers[0], $numbers[1]);
        $secRange = range($numbers[2], $numbers[3]);
        if (
            in_array($numbers[0], $secRange) && in_array($numbers[1], $secRange) ||
            in_array($numbers[2], $firstRange) && in_array($numbers[3], $firstRange)
        ){
            $count1 ++;
        }
        if (
            in_array($numbers[0], $secRange) || in_array($numbers[1], $secRange) ||
            in_array($numbers[2], $firstRange) || in_array($numbers[3], $firstRange)
        ){
            $count2 ++;
        }
    }
    echo 'Solution for Day 4-1 is ' . $count1 . '<br />';
    echo 'Solution for Day 4-2 is ' . $count2;
}

