<?php

namespace BrainGames\Games\Progression;

use BrainGames\Games\QuestionBase;
use BrainGames\Games\QuestionInterface;

class Question extends QuestionBase implements QuestionInterface
{

    private const PROGRESSION_LENGTH = 10;

    public static function getRules(): string
    {
        return 'What number is missing in the progression?';
    }

    public function getQuestion(): string
    {
        if (!$this->question) {
            $sequence = $this->makeProgression();
            $randIndex = array_rand($sequence);
            $randElem = $sequence[$randIndex];
            $sequence[$randIndex] = '..';
            $this->question = join(' ', $sequence);
            $this->answer = $randElem;
        }
        return $this->question;
    }

    private function makeProgression(): array
    {
        $start = $this->getRandomNumber();
        $diff = $this->getRandomNumber();
        $sequence = [$start];
        for ($i = 1; $i < self::PROGRESSION_LENGTH; $i++) {
            $sequence[] = $sequence[$i - 1] + $diff;
        }
        return $sequence;
    }
}
