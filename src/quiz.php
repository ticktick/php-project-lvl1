<?php

namespace BrainGames\quiz;

use BrainGames\cli as ui;

function run(string $rules, callable $getRoundData, int $numberOfQuestions = 3): void
{
    ui\tell("Welcome to the Brain Game!");
    ui\tell($rules);
    ui\delimiter();

    $userName = ui\ask("May I have your name?");
    ui\tell("Hello, %s!", $userName);
    ui\delimiter();

    $correctAnswersCount = askQuestions($getRoundData, $numberOfQuestions);
    if ($correctAnswersCount == $numberOfQuestions) {
        ui\tell("Congratulations, %s!", $userName);
    } else {
        ui\tell("Let's try again, %s!", $userName);
    }
}

function askQuestions(callable $getRoundData, int $numberOfQuestions): int
{
    $correctAnswersCounter = 0;
    for ($i = 0; $i < $numberOfQuestions; $i++) {
        [$question, $correctAnswer] = $getRoundData();
        ui\tell($question);
        $answer = ui\ask("Your answer");

        if ($answer === $correctAnswer) {
            ui\tell("Correct!");
            $correctAnswersCounter++;
        } else {
            ui\tell("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $correctAnswer);
            break;
        }
    }

    return $correctAnswersCounter;
}
