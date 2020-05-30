<?php

namespace BrainGames\games\prime;

use function BrainGames\games\lib\getRandomNumber;

function getRules(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function getQuestion(): array
{
    $number = getRandomNumber();
    $question = (string)$number;
    $answer = isPrime($number) ? 'yes' : 'no';
    return [$question, $answer];
}

function isPrime(int $number): bool
{
    if ($number <= 2 || $number % 2 == 0) {
        return $number == 2;
    }
    return isPrimeRecursive($number, 3);
}

function isPrimeRecursive(int $number, int $divisor)
{
    if ($divisor * $divisor > $number) {
        return true;
    }
    if ($number % $divisor == 0) {
        return false;
    }
    return isPrimeRecursive($number, $divisor + 2);
}
