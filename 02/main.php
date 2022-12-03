<?php

$rows = file('input_02.txt');

const SCORE = ['X' => 1, 'Y' => 2, 'Z' => 3];
const GAME_MAP = [
    'X' => [
        'A' => 3,
        'C' => 6,
        'B' => 0
    ],
    'Y' => [
        'B' => 3,
        'A' => 6,
        'C' => 0
    ],
    'Z' => [
        'C' => 3,
        'B' => 6,
        'A' => 0
    ]
];
const STRATEGY = [
    'Z' => [
        'A' => 8,
        'B' => 9,
        'C' => 7
    ],
    'Y' => [
        'A' => 4,
        'B' => 5,
        'C' => 6
    ],
    'X' => [
        'A' => 3,
        'B' => 1,
        'C' => 2
    ]
];

getTotalScore($rows);
echo '<br />';
getCorrectTotalScore($rows);

function getTotalScore($rows): void
{
    $score = 0;
    foreach ($rows as $row) {
        $inputs = explode(' ', $row);
        $score += SCORE[trim($inputs[1])];
        $score += GAME_MAP[trim($inputs[1])][$inputs[0]];
    }

    echo 'Solution Day 2-1: ' . $score;
}

function getCorrectTotalScore($rows): void
{
    $score = 0;
    foreach ($rows as $row) {
        $inputs = explode(' ', $row);
        $score += STRATEGY[trim($inputs[1])][$inputs[0]];
    }

    echo 'Solution Day 2-2: ' . $score;
}