<?php

namespace BrainGames;

$autoloadPathGlobal = __DIR__ . '/../../../autoload.php';
$autoloadPathLocal = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPathGlobal)) {
    require_once $autoloadPathGlobal;
} else {
    require_once $autoloadPathLocal;
}

$runFunc = function ($gameType, $numberOfQuestions = 3) {
    $game = new Quiz($gameType, $numberOfQuestions);
    $game->run();
};

return $runFunc;
