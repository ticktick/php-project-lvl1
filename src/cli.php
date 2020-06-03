<?php

namespace BrainGames\cli;

use function cli\line;
use function cli\prompt;

function tell(string $text, ...$params): void
{
    line($text, ...$params);
}

function delimiter(): void
{
    line("");
}

function ask(string $question): string
{
    return prompt($question);
}

function showErrorAndStop(string $error = null)
{
    $error = $error ?? 'An internal error occurred. Game stopped.';
    line($error);
    exit(-1);
}
