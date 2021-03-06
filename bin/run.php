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
    $descriptionConstantName = $gameNamespace . '\DESCRIPTION';
    $getRoundDataFuncName = $gameNamespace . '\getRoundData';

    if (!defined($descriptionConstantName) || !function_exists($getRoundDataFuncName)) {
        showErrorAndStop();
    }

    $description = constant($descriptionConstantName);
    $getRoundData = function () use ($getRoundDataFuncName): array {
        return call_user_func($getRoundDataFuncName);
    };

    quiz\run($description, $getRoundData, $numberOfQuestions);
};

return $runFunc;
