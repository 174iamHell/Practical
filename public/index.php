<?php

use App\Application;

require_once '../vendor/autoload.php';

try {
    $app = new Application();

    $app->run();
} catch (\Throwable $th) {
    var_dump($th);
}

