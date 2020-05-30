<?php

namespace BrainGames\cli;

use function cli\line;
use function cli\prompt;

function showWelcome()
{
    line('Welcome to the Brain Game!');
}

function showRules(string $rules)
{
    line($rules);
    line("");
}

function askName()
{
    global $userName;
    $userName = prompt('May I have your name?');
}

function showHello()
{
    line("Hello, %s!", getName());
    line("");
}

function getName(): string
{
    global $userName;
    return $userName;
}

function askQuestion(string $question)
{
    line('Question: %s', $question);
}

function getAnswer(): string
{
    return prompt('Your answer');
}

function showAnswerCorrect()
{
    line("Correct!");
}

function showAnswerIncorrect(string $answer, string $correctAnswer)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
}

function showTryAgain()
{
    line("Let's try again, %s!", getName());
}

function showCongratulations()
{
    line('Congratulations, %s!', getName());
}

function showErrorAndStop(string $error = null)
{
    $error = $error ?? 'An internal error occurred. Game stopped.';
    line($error);
    exit(-1);
}
