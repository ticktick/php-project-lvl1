<?php

namespace BrainGames\Games\Prime;

use BrainGames\Games\QuestionBase;
use BrainGames\Games\QuestionInterface;

class Question extends QuestionBase implements QuestionInterface
{

    public static function getRules(): string
    {
        return 'Answer "yes" if given number is prime. Otherwise answer "no".';
    }

    public function getQuestion(): string
    {
        if (!$this->question) {
            $number = $this->getRandomNumber();
            $this->question = (string)$number;
            $this->answer = $this->isPrime($number) ? 'yes' : 'no';
        }
        return $this->question;
    }

    private function isPrime(int $number): bool
    {
        if ($number <= 2 || $number % 2 == 0) {
            return $number == 2;
        }

        return $this->isPrimeRecursive($number, 3);
    }

    private function isPrimeRecursive(int $number, int $divisor)
    {
        if ($divisor * $divisor > $number) {
            return true;
        }

        if ($number % $divisor == 0) {
            return false;
        }

        return $this->isPrimeRecursive($number, $divisor + 2);
    }
}
