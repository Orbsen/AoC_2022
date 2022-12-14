<?php
$rows = file('input_05.txt');
$crateStack = [
    '1' => ['S', 'C', 'V', 'N'],
    '2' => ['Z', 'M', 'J', 'H', 'N', 'S'],
    '3' => ['M', 'C', 'T', 'G', 'J', 'N', 'D'],
    '4' => ['T', 'D', 'F', 'J', 'W', 'R', 'M'],
    '5' => ['P', 'F', 'H'],
    '6' => ['C', 'T', 'Z', 'H', 'J'],
    '7' => ['D', 'P', 'R', 'Q', 'F', 'S', 'L', 'Z'],
    '8' => ['C', 'S', 'L', 'H', 'D', 'F', 'P', 'W'],
    '9' => ['D', 'S', 'M', 'P', 'F', 'N', 'G', 'Z']
];

getTopCreates9000($rows, $crateStack);
echo '<br />';
getTopCrates9001($rows, $crateStack);

function getTopCreates9000($rows, $crateStack): void
{
    $result = '';

    foreach ($rows as $row) {
        sscanf($row, 'move %d from %d to %d', $anzahl, $from, $to);
        for ($i = 0; $i < $anzahl; $i++) {
            $transfer = array_pop($crateStack[$from]);
            $crateStack[$to][] = $transfer;
        }
    }

    foreach ($crateStack as $crate) {
       $result = $result . end($crate);
    }

    echo 'Solution for Day 5-1 is: ' . $result;
}

function getTopCrates9001($rows, $crateStack): void
{
    $result = '';

    foreach ($rows as $row) {
        sscanf($row, 'move %d from %d to %d', $anzahl, $from, $to);
        $transfer = array_splice($crateStack[$from], '-' . $anzahl);

        foreach ($transfer as $item) {
            $crateStack[$to][] = $item;
        }
    }

    foreach ($crateStack as $crate) {
        $result = $result . end($crate);
    }

    echo 'Solution for Day 5-2 is: ' . $result;
}
