<?php

namespace BrainGames\games\even;

use function BrainGames\lib\getRandomNumber;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function getRoundData(): array
{
    $number = getRandomNumber();
    $question = (string)$number;
    $answer = isEven($number) ? 'yes' : 'no';
    return [$question, $answer];
}

function isEven(int $number): bool
{
    return $number % 2 == 0;
}
