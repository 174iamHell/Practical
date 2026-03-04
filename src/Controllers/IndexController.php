<?php

namespace App\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Micro\Collection as MicroCollection;

final class IndexController extends Controller
{
    public static function routes(): MicroCollection
    {
        $collection = new MicroCollection();
        $collection->setHandler(new IndexController());
        $collection->get('/', 'index');

        return $collection;
    }

    public function index(): string
    {
        return json_encode(['state' => 'ok!']);
    }
}
