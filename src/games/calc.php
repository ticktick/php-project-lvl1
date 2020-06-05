<?php

namespace BrainGames\games\calc;

use function BrainGames\lib\getRandomNumber;

const DESCRIPTION = "What is the result of the expression?";

function getRoundData(): array
{
    $operations = [
        '+' => fn (int $a, int $b) => $a + $b,
        '-' => fn (int $a, int $b) => $a - $b,
        '*' => fn (int $a, int $b) => $a * $b
    ];

    $num1 = getRandomNumber();
    $num2 = getRandomNumber();
    $operators = array_keys($operations);
    $operator = $operators[array_rand($operators)];
    $question = sprintf('%d %s %d', $num1, $operator, $num2);
    $operation = $operations[$operator];
    $answer = (string)$operation($num1, $num2);
    return [$question, $answer];
}
