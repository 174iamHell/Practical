<?php

namespace App;

use App\Controllers\IndexController;
use App\Controllers\CategoriesController;
use App\Models\Categories;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Micro;

final class Application
{
    private Micro $app;

    public function run(): void
    {
        
        $container = new FactoryDefault();

        $container->setShared('db', function () {
            return new Mysql([
                'host' => 'localhost',
                'port' => 3306,
                'dbname' => 'shop',
                'user' => 'root',
                'password' => 'root',
            ]);
        });

        $this->app = new Micro($container);

        $this->app->notFound(function () {
            echo '404';
        });
        $this->mountRoutes();
        $this->app->handle($_SERVER['REQUEST_URI']);
    }

    private function mountRoutes(): void
    {
        $this->app->mount(IndexController::routes());
        $this->app->mount(CategoriesController::routes());
    }
}
