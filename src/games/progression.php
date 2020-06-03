<?php

namespace BrainGames\games\progression;

use function BrainGames\lib\getRandomNumber;

const PROGRESSION_LENGTH = 10;

const RULES = 'What number is missing in the progression?';

function getRoundData(): array
{
    $start = getRandomNumber();
    $diff = getRandomNumber();
    $sequence = makeProgression($start, $diff, PROGRESSION_LENGTH);
    $randIndex = array_rand($sequence);
    $answer = (string)$sequence[$randIndex];
    $sequence[$randIndex] = '..';
    $question = join(' ', $sequence);
    return [$question, $answer];
}

function makeProgression(int $start, int $diff, int $progressionLength): array
{
    $sequence = [];
    for ($n = 0; $n < $progressionLength; $n++) {
        $sequence[] = $start + $diff * $n;
    }
    return $sequence;
}
