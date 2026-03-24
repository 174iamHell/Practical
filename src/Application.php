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
use Phalcon\Config\Config;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Di\FactoryDefault;
use Phalcon\Http\Response;
use Phalcon\Mvc\Micro;
use Sinbadxiii\PhalconAuthJWT\Blacklist;
use Sinbadxiii\PhalconAuthJWT\Builder;
use Sinbadxiii\PhalconAuthJWT\Http\Parser\Chains\AuthHeaders;
use Sinbadxiii\PhalconAuthJWT\Http\Parser\Chains\InputSource;
use Sinbadxiii\PhalconAuthJWT\Http\Parser\Chains\QueryString;
use Sinbadxiii\PhalconAuthJWT\Http\Parser\Parser;
use Sinbadxiii\PhalconAuthJWT\JWT;
use Sinbadxiii\PhalconAuthJWT\Manager as JWTManager;
use Sinbadxiii\PhalconAuthJWT\Claims;


final class Application
{
    private Micro $app;

    public function run(): void
    {
        $container = new FactoryDefault();

        $container->setShared('config', function () {
            return new Config([
                'db' => [
                    'host' => 'localhost',
                    'port' => 3306,
                    'dbname' => 'shop',
                    'user' => 'root',
                    'password' => 'root',
                ],
                'auth' => [],
                'jwt' => [
                    'secret' => $_ENV['JWT_SECRET'],

                    'keys' => [
                        'public' => $_ENV['JWT_PUBLIC_KEY'],
                        'private' => $_ENV['JWT_PRIVATE_KEY'],
                        'passphrase' => $_ENV['JWT_PASSPHRASE'],
                    ],

                    //default 30
                    'ttl' => $_ENV['JWT_TTL'],

                    //default null
                    'max_refresh_period' => $_ENV['JWT_MAX_REFRESH_PERIOD'],

                    //default HS256
                    'algo' => $_ENV['JWT_ALGO'],

                    'required_claims' => [
                        Claims\Issuer::NAME,
                        Claims\IssuedAt::NAME,
                        Claims\Expiration::NAME,
                        Claims\Subject::NAME,
                        Claims\JwtId::NAME,
                    ],

                    'lock_subject' => true,

                    //default 0
                    'leeway' => $_ENV['JWT_LEEWAY'],

                    //default true
                    'blacklist_enabled' => $_ENV['JWT_BLACKLIST_ENABLED'],

                    //default 0
                    'blacklist_grace_period' => $_ENV['JWT_BLACKLIST_GRACE_PERIOD'],

                    'decrypt_cookies' => false,

                    'providers' => [
                        /**
                         * \Sinbadxiii\PhalconAuthJWT\Providers\JWT\Phalcon::class,
                         * \Sinbadxiii\PhalconAuthJWT\Providers\JWT\Lcobucci::class,
                         */
                        'jwt' => \Sinbadxiii\PhalconAuthJWT\Providers\JWT\Lcobucci::class,
                        'storage' => \Sinbadxiii\PhalconAuthJWT\Providers\Storage\Cache::class,
                    ],
                ]
            ]);
        });

        $container->setShared('db', function () use ($container) {
            $config = $container->getShared('config')->path('db');
            return new Mysql([
                'host' => $config->host,
                'port' => $config->port,
                'dbname' => $config->dbname,
                'user' => $config->user,
                'password' => $config->password,
            ]);
        });


        $container->setShared("jwt", function () use ($container) {

            $configJwt = $container->getShared('config')->path('jwt');

            $providerJwt = $configJwt->providers->jwt;

            $builder = new Builder();

            $builder->lockSubject($configJwt->lock_subject)
                ->setTTL($configJwt->ttl)
                ->setRequiredClaims($configJwt->required_claims->toArray())
                ->setLeeway($configJwt->leeway)
                ->setMaxRefreshPeriod($configJwt->max_refresh_period);

            $parser = new Parser($container->getRequest(), [
                new AuthHeaders,
                new QueryString,
                new InputSource,
            ]);

            $providerStorage = $configJwt->providers->storage;

            $blacklist = new Blacklist(new $providerStorage($container->getCache()));

            $blacklist->setGracePeriod($configJwt->blacklist_grace_period);

            $manager = new JWTManager(new $providerJwt(
                $configJwt->secret,
                $configJwt->algo,
                $configJwt->keys->toArray()
            ), $blacklist, $builder);

            $manager->setBlacklistEnabled((bool) $configJwt->blacklist_enabled);

            return new JWT($builder, $manager, $parser);
        });

        $di->setShared("auth", function () {

            $security = $this->getSecurity();

            $adapter     = new \Sinbadxiii\PhalconAuth\Adapter\Model($security);
            $adapter->setModel(App\Models\User::class);

            $guard = new \Sinbadxiii\PhalconAuthJWT\Guard\JWTGuard(
                $adapter,
                $this->getJwt(),
                $this->getRequest(),
                $this->getEventsManager(),
            );

            $manager = new Manager();
            $manager->addGuard("jwt", $guard);
            $manager->setDefaultGuard($guard);

            $manager->setAccess(new \App\Security\Access\Jwt());
            $manager->except("/auth/login");

            return $manager;
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
