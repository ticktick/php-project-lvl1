<?php

namespace BrainGames\games\gcd;

use function BrainGames\lib\getRandomNumber;

const RULES = 'Find the greatest common divisor of given numbers.';

function getRoundData(): array
{
    $num1 = getRandomNumber();
    $num2 = getRandomNumber();
    $question = sprintf('%d %d', $num1, $num2);
    $answer = (string)getGCD($num1, $num2);
    return [$question, $answer];
}

function getGCD(int $a, int $b): int
{
    $reminder = $a % $b;
    if ($reminder == 0) {
        return $b;
    } else {
        return getGCD($b, $reminder);
    }
}
