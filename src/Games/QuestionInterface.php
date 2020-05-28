<?php

namespace BrainGames\Games;

interface QuestionInterface
{

    public static function getRules(): string;

    public function getCorrectAnswer(): string;

    public function getQuestion(): string;
}
