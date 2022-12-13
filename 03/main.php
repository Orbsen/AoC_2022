<?php

$rows = file('input_03.txt');
$pMap = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$groups = array_chunk($rows, 3);

getSumOfPriorities($rows, $pMap);
echo '<br />';
getSumOfGroupPriorities($groups, $pMap);

function getSumOfPriorities($rows, $pMap): void
{
    $pSum = 0;
    foreach ($rows as $row) {
       $compartments = str_split(trim($row), strlen($row)/2);

       $compartmentOne = str_split($compartments[0]);

       foreach (array_unique($compartmentOne) as $item) {
           if (str_contains($compartments[1], $item)) {
               $pSum += strpos($pMap, $item) + 1;
           }
       }
    }
    echo 'Solution for Day 3-1 is '. $pSum;
}

function getSumOfGroupPriorities($groups, $pMap): void
{
    $pSum = 0;
    foreach ($groups as $group) {
        $items = array_unique(str_split(trim($group[0])));
        foreach ($items as $item) {
            if (str_contains($group[1], $item) && str_contains($group[2], $item)) {
                $pSum += strpos($pMap, $item) + 1;
            }
        }
    }
    echo 'Solution for Day 3-2 is '. $pSum;
}