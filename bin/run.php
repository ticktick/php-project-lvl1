<?php

namespace BrainGames;

use BrainGames\quiz;

use function BrainGames\cli\showErrorAndStop;

$autoloadPathGlobal = __DIR__ . '/../../../autoload.php';
$autoloadPathLocal = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPathGlobal)) {
    require_once $autoloadPathGlobal;
} else {
    require_once $autoloadPathLocal;
}

$runFunc = function ($gameType, $numberOfQuestions = 3) {
    $gameNamespace = sprintf("%s\games\%s", __NAMESPACE__, $gameType);
    $getRulesFuncName = $gameNamespace . '\getRules';
    $getQuestionFuncName = $gameNamespace . '\getQuestion';

    if (!function_exists($getRulesFuncName) || !function_exists($getQuestionFuncName)) {
        showErrorAndStop();
    }

    $rules = call_user_func($getRulesFuncName);
    $getQuestionFunc = function () use ($getQuestionFuncName): array {
        return call_user_func($getQuestionFuncName);
    };

    quiz\run($rules, $getQuestionFunc, $numberOfQuestions);
};

return $runFunc;
