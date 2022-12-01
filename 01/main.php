<?php

$rows = file('input_01.txt', FILE_IGNORE_NEW_LINES);
$groups = getGroups($rows);

findElfWithMostCalories($groups);
echo '<br />';
findTopThreeElfsWithMostCalories($groups);

function getGroups($rows): array
{
    $return = [];
    $counter = 0;
    foreach ($rows as $row) {
        if (empty($row)) {
            $counter++;
            continue;
        }
        $return[$counter][] = $row;
    }
    return $return;
}

function findElfWithMostCalories($groups): void
{
    $result = 0;
    foreach ($groups as $group) {
        if ($result < array_sum($group)) {
            $result = array_sum($group);
        }
    }

    echo 'Solution 1 on Day 1: '. $result;
}

function findTopThreeElfsWithMostCalories($groups): void
{
    $totalCalories = [];
    foreach ($groups as $group) {
        $totalCalories[] = array_sum($group);
    }
    rsort($totalCalories);
    echo 'Solution 2 on Day 1: ' .$totalCalories[0] + $totalCalories[1] + $totalCalories[2];
}