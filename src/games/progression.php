<?php

namespace BrainGames\games\progression;

use function BrainGames\games\lib\getRandomNumber;

const PROGRESSION_LENGTH = 10;

function getRules(): string
{
    return 'What number is missing in the progression?';
}

function getQuestion(): array
{
    $sequence = makeProgression();
    $randIndex = array_rand($sequence);
    $randElem = $sequence[$randIndex];
    $sequence[$randIndex] = '..';
    $question = join(' ', $sequence);
    $answer = (string)$randElem;
    return [$question, $answer];
}

function makeProgression(): array
{
    $start = getRandomNumber();
    $diff = getRandomNumber();
    $sequence = [$start];
    for ($i = 1; $i < PROGRESSION_LENGTH; $i++) {
        $sequence[] = $sequence[$i - 1] + $diff;
    }
    return $sequence;
}
