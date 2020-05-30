<?php

namespace BrainGames\games\gcd;

use function BrainGames\games\lib\getRandomNumber;

function getRules(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

function getQuestion(): array
{
    $num1 = getRandomNumber();
    $num2 = getRandomNumber();
    $question = sprintf('%d %d', $num1, $num2);
    $answer = (string)gcd($num1, $num2);
    return [$question, $answer];
}

function gcd(int $a, int $b): int
{
    $reminder = $a % $b;
    if ($reminder == 0) {
        return $b;
    } else {
        return gcd($b, $reminder);
    }
}
