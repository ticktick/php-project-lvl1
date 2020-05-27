<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

class Cli
{

    private $userName = 'Guest';

    public function showWelcome()
    {
        line('Welcome to the Brain Game!');
    }

    public function showRules()
    {
        line('Answer "yes" if the number is even, otherwise answer "no".');
        line("");
    }

    public function askName()
    {
        $this->userName = prompt('May I have your name?');
    }

    public function showHello()
    {
        line("Hello, %s!", $this->getName());
        line("");
    }

    public function getName(): string
    {
        return $this->userName;
    }

    public function askQuestion(string $question)
    {
        line('Question: %s', $question);
    }

    public function getAnswer(): string
    {
        return prompt('Your answer');
    }

    public function showAnswerCorrect()
    {
        line("Correct!");
    }

    public function showAnswerIncorrect(string $answer, string $correctAnswer)
    {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
    }

    public function showTryAgain()
    {
        line("Let's try again, %s!", $this->getName());
    }

    public function showCongratulations()
    {
        line('Congratulations, %s!', $this->getName());
    }
}
