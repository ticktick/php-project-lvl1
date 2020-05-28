<?php

namespace BrainGames\Games\Calc;

use BrainGames\Games\QuestionBase;
use BrainGames\Games\QuestionInterface;

class Question extends QuestionBase implements QuestionInterface
{

    public static function getRules(): string
    {
        return "What is the result of the expression?";
    }

    public function getQuestion(): string
    {
        if (!$this->question) {
            $this->question = $this->generateExpression();
            eval(sprintf('$this->answer = %s;', $this->question));
        }
        return $this->question;
    }

    private function generateExpression()
    {
        $firstNumber = $this->getRandomNumber();
        $secondNumber = $this->getRandomNumber();
        $operators = ['+', '-', '*'];
        $operator = $operators[array_rand($operators)];

        $expression = sprintf('%d %s %d', $firstNumber, $operator, $secondNumber);
        return $expression;
    }
}
