<?php

namespace BrainGames\Games\Calc;

use BrainGames\Games\QuestionInterface;

class Question implements QuestionInterface
{

    private $question;

    public static function getRules(): string
    {
        return "What is the result of the expression?";
    }

    public function getCorrectAnswer(): string
    {
        $res = 0;
        eval(sprintf('$res = %s;', $this->question));
        return (string)$res;
    }

    public function getQuestion(): string
    {
        if (!$this->question) {
            $this->question = $this->generateExpression();
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

    private function getRandomNumber(): int
    {
        return mt_rand(1, 100);
    }
}
