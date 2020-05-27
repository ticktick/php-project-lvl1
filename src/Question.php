<?php

namespace BrainGames;

class Question
{

    private $question;

    public function __toString(): string
    {
        return $this->getQuestion();
    }

    public function getCorrectAnswer()
    {
        $number = (int)$this->question;
        return $this->numberIsEven($number) ? 'yes' : 'no';
    }

    private function getQuestion(): string
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
