<?php

namespace BrainGames\games\even;

use function BrainGames\games\lib\getRandomNumber;

function getRules(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function getQuestion(): array
{
    $number = getRandomNumber();
    $question = (string)$number;
    $answer = numberIsEven($number) ? 'yes' : 'no';
    return [$question, $answer];
}

function numberIsEven(int $number): bool
{
    return $number % 2 == 0;
}
