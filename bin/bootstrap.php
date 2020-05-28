<?php

$autoloadPathGlobal = __DIR__ . '/../../../autoload.php';
$autoloadPathLocal = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPathGlobal)) {
    require_once $autoloadPathGlobal;
} else {
    require_once $autoloadPathLocal;
}
