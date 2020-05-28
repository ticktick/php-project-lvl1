<?php

namespace BrainGames\Games\Even;

use BrainGames\Games\QuestionBase;
use BrainGames\Games\QuestionInterface;

class Question extends QuestionBase implements QuestionInterface
{

    public static function getRules(): string
    {
        return 'Answer "yes" if the number is even, otherwise answer "no".';
    }

    public function getQuestion(): string
    {
        if (!$this->question) {
            $number = $this->getRandomNumber();
            $this->question = (string)$number;
            $this->answer = $this->numberIsEven($number) ? 'yes' : 'no';
        }
        return $this->question;
    }

    private function numberIsEven(int $number): bool
    {
        return $number % 2 == 0;
    }
}
