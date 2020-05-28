<?php

namespace BrainGames;

use BrainGames\Games\Even\Question as EvenQuestion;
use BrainGames\Games\Calc\Question as CalcQuestion;
use BrainGames\Games\Gcd\Question as GcdQuestion;
use BrainGames\Games\QuestionInterface;

class Quiz
{

    public const TYPE_EVEN = 'even';
    public const TYPE_CALC = 'calc';
    public const TYPE_GCD = 'gcd';

    private $typeClasses = [
        self::TYPE_EVEN => EvenQuestion::class,
        self::TYPE_CALC => CalcQuestion::class,
        self::TYPE_GCD => GcdQuestion::class
    ];

    private $cli;
    /** @var QuestionInterface */
    private $questionClass;
    private $numberOfQuestions = 3;

    public function __construct(string $questionType, int $numberOfQuestions = null)
    {
        $this->cli = new Cli();
        if (isset($this->typeClasses[$questionType])) {
            $this->questionClass = $this->typeClasses[$questionType];
        } else {
            $this->cli->showErrorAndStop();
        }
        if ($numberOfQuestions) {
            $this->numberOfQuestions = $numberOfQuestions;
        }
    }

    public function run()
    {
        $this->cli->showWelcome();
        $this->cli->showRules($this->questionClass::getRules());
        $this->cli->askName();
        $this->cli->showHello();

        $correctAnswersCount = $this->askQuestions($this->numberOfQuestions);

        if ($correctAnswersCount == $this->numberOfQuestions) {
            $this->cli->showCongratulations();
        } else {
            $this->cli->showTryAgain();
        }
    }

    private function askQuestions(int $numberOfQuestions): int
    {
        $correctAnswersCounter = 0;
        for ($i = 0; $i < $numberOfQuestions; $i++) {
            /** @var $question QuestionInterface */
            $question = new $this->questionClass();
            $this->cli->askQuestion($question->getQuestion());
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
