<?php

namespace BrainGames\quiz;

use BrainGames\cli as ui;

function run(string $rules, callable $getQuestionFunc, int $numberOfQuestions = 3)
{
    ui\showWelcome();
    ui\showRules($rules);
    ui\askName();
    ui\showHello();

    $correctAnswersCount = askQuestions($getQuestionFunc, $numberOfQuestions);

    if ($correctAnswersCount == $numberOfQuestions) {
        ui\showCongratulations();
    } else {
        ui\showTryAgain();
    }
}

function askQuestions(callable $getQuestionFunc, int $numberOfQuestions): int
{
    $correctAnswersCounter = 0;
    for ($i = 0; $i < $numberOfQuestions; $i++) {
        [$question, $correctAnswer] = $getQuestionFunc();
        ui\askQuestion($question);
        $answer = ui\getAnswer();

        if ($answer === $correctAnswer) {
            ui\showAnswerCorrect();
            $correctAnswersCounter++;
        } else {
            ui\showAnswerIncorrect($answer, $correctAnswer);
            break;
        }
    }

    return $correctAnswersCounter;
}
