<?php

namespace BrainGames\Games\Gcd;

use BrainGames\Games\QuestionBase;
use BrainGames\Games\QuestionInterface;

class Question extends QuestionBase implements QuestionInterface
{

    public static function getRules(): string
    {
        return 'Find the greatest common divisor of given numbers.';
    }

    public function getQuestion(): string
    {
        if (!$this->question) {
            $firstNumber = $this->getRandomNumber();
            $secondNumber = $this->getRandomNumber();
            $this->question = sprintf('%d %d', $firstNumber, $secondNumber);
            $this->answer = $this->gcd($firstNumber, $secondNumber);
        }
        return $this->question;
    }

    private function gcd(int $a, int $b): int
    {
        $reminder = $a % $b;
        if ($reminder == 0) {
            return $b;
        } else {
            return $this->gcd($b, $reminder);
        }
    }
}
