<?php

$input = file('input_06.txt');
$paketMarker = 4;
$msgMarker = 14;

getFirstMarker($input[0], $paketMarker);
echo '<br />';
getFirstMarker($input[0], $msgMarker);

function getFirstMarker($input, $type): void
{
    $counter = 0;
    $stopLoop = false;
    while (!$stopLoop) {
        $marker = substr($input, $counter, $type);
        if (strlen(count_chars($marker, 3)) == $type) {
            if ($type == 4) {
                echo 'Solution for Day 6-1 is: '. $counter + $type;
            } elseif ($type == 14) {
                echo 'Solution for Day 6-2 is: '. $counter + $type;
            }
            $stopLoop = true;
        }
        $counter++;
    }
}