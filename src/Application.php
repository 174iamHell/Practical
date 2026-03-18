<?php

namespace App;

use App\Controllers\CartsController;
use App\Controllers\BrandsController;
use App\Controllers\IndexController;
use App\Controllers\CategoriesController;
use App\Controllers\OrderProductsController;
use App\Controllers\OrdersController;
use App\Controllers\ProductsController;
use App\Controllers\UsersController;
use App\Middlewares\ResponseMiddleware;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Di\FactoryDefault;
use Phalcon\Http\Response;
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

        $this->app->after(new ResponseMiddleware());

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
        $this->app->mount(BrandsController::routes());
        $this->app->mount(ProductsController::routes());
        $this->app->mount(UsersController::routes());
        $this->app->mount(CartsController::routes());
        $this->app->mount(OrdersController::routes());
        $this->app->mount(OrderProductsController::routes());
    }
}
