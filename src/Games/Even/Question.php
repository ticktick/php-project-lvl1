<?php

namespace BrainGames\Games\Even;

use BrainGames\Games\QuestionInterface;

class Question implements QuestionInterface
{

    private $question;

    public static function getRules(): string
    {
        return 'Answer "yes" if the number is even, otherwise answer "no".';
    }

    public function getCorrectAnswer(): string
    {
        $number = (int)$this->question;
        return $this->numberIsEven($number) ? 'yes' : 'no';
    }

    public function getQuestion(): string
    {
        if (!$this->question) {
            $number = $this->getRandomNumber();
            $this->question = (string)$number;
        }
        return $this->question;
    }

    private function getRandomNumber(): int
    {
        return mt_rand(1, 100);
    }

    private function numberIsEven(int $number): bool
    {
        return $number % 2 == 0;
    }
}
