<?php

namespace BrainGames;

class Game
{

    private $cli;
    private $numberOfQuestions = 3;

    public function __construct(int $numberOfQuestions = null)
    {
        $this->cli = new Cli();
        if ($numberOfQuestions) {
            $this->numberOfQuestions = $numberOfQuestions;
        }
    }

    public function run()
    {
        $this->cli->showWelcome();
        $this->cli->showRules();
        $this->cli->askName();
        $this->cli->showHello();

        $correctAnswersCounter = $this->askQuestions($this->numberOfQuestions);

        if ($correctAnswersCounter == $this->numberOfQuestions) {
            $this->cli->showCongratulations();
        } else {
            $this->cli->showTryAgain();
        }
    }

    private function askQuestions(int $numberOfQuestions): int
    {
        $correctAnswersCounter = 0;
        for ($i = 0; $i < $numberOfQuestions; $i++) {
            $question = new Question();
            $this->cli->askQuestion($question);
            $correctAnswer = $question->getCorrectAnswer();
            $answer = $this->cli->getAnswer();

            if ($answer == $correctAnswer) {
                $this->cli->showAnswerCorrect();
                $correctAnswersCounter++;
            } else {
                $this->cli->showAnswerIncorrect($answer, $correctAnswer);
                break;
            }
        }

        return $correctAnswersCounter;
    }
}
