<?php

namespace BrainGames\Games;

class QuestionBase
{

    protected $question;
    protected $answer;

    public function getCorrectAnswer(): string
    {
        return $this->answer;
    }

    protected function getRandomNumber(): int
    {
        return mt_rand(1, 100);
    }
}
