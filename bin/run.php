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
    $rulesConstantName = $gameNamespace . '\RULES';
    $getRoundDataFuncName = $gameNamespace . '\getRoundData';

    if (!defined($rulesConstantName) || !function_exists($getRoundDataFuncName)) {
        showErrorAndStop();
    }

    $rules = constant($rulesConstantName);
    $getRoundData = function () use ($getRoundDataFuncName): array {
        return call_user_func($getRoundDataFuncName);
    };

    quiz\run($rules, $getRoundData, $numberOfQuestions);
};

return $runFunc;
