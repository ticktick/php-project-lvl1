<?php

namespace BrainGames\games\calc;

use function BrainGames\games\lib\getRandomNumber;

function getRules(): string
{
    return "What is the result of the expression?";
}

function getQuestion(): array
{
    [$operator, $num1, $num2] = generateExpressionParams();
    $expression = sprintf('%d %s %d', $num1, $operator, $num2);
    $operatorFunc = getOperatorFuncs()[$operator];
    $answer = (string)$operatorFunc((int)$num1, (int)$num2);
    return [$expression, $answer];
}

function generateExpressionParams(): array
{
    $firstNumber = getRandomNumber();
    $secondNumber = getRandomNumber();
    $operatorFuncs = getOperatorFuncs();
    $operators = array_keys($operatorFuncs);
    $operator = $operators[array_rand($operators)];
    return [$operator, $firstNumber, $secondNumber];
}

function getOperatorFuncs(): array
{
    return [
        '+' => function (int $num1, int $num2) {
            return $num1 + $num2;
        },
        '-' => function (int $num1, int $num2) {
            return $num1 - $num2;
        },
        '*' => function (int $num1, int $num2) {
            return $num1 * $num2;
        },
    ];
}
