<?php

namespace App;

use App\Controllers\Auth\LoginController;
use App\Controllers\CartsController;
use App\Controllers\BrandsController;
use App\Controllers\IndexController;
use App\Controllers\CategoriesController;
use App\Controllers\OrderProductsController;
use App\Controllers\OrdersController;
use App\Controllers\ProductsController;
use App\Controllers\UsersController;
use App\Middlewares\ResponseMiddleware;
use App\Security\Authenticate;
use Phalcon\Cache\AdapterFactory;
use Phalcon\Cache\Cache;
use Phalcon\Config\Config;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Micro;
use Phalcon\Storage\SerializerFactory;
use Sinbadxiii\PhalconAuth\Manager;
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
                'auth' => [
                    [
                        'defaults' => [
                            'guard' => 'jwt'
                        ],
                        'guards' => [
                            'jwt' => [
                                'driver' => 'token',
                                'provider' => 'users',
                            ],
                        ],
                        'providers' => [
                            'users' => [
                                'adapter' => 'model',
                                'model'  => \App\Models\Users::class,
                            ],
                        ],
                    ],
                ],
                'jwt' => [
                    'secret' => 'S@l5"kyT9O{dN9S{>F$p~m&X££vMXW/W',

                    'keys' => [
                        'public' => $_ENV['JWT_PUBLIC_KEY'],
                        'private' => $_ENV['JWT_PRIVATE_KEY'],
                        'passphrase' => $_ENV['JWT_PASSPHRASE'],
                    ],

                    //default 30
                    'ttl' => 30,

                    //default null
                    'max_refresh_period' => null,

                    //default HS256
                    'algo' => 'HS256',

                    'required_claims' => [
                        Claims\Issuer::NAME,
                        Claims\IssuedAt::NAME,
                        Claims\Expiration::NAME,
                        Claims\Subject::NAME,
                        Claims\JwtId::NAME,
                    ],

                    'lock_subject' => true,

                    //default 0
                    'leeway' => 0,

                    //default true
                    'blacklist_enabled' => true,

                    //default 0
                    'blacklist_grace_period' => 0,

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

        $container->setShared('cache', function () {
            $serializerFactory = new SerializerFactory();
            $adapterFactory    = new AdapterFactory($serializerFactory);

            $options = [
                'defaultSerializer' => 'Json',
                'lifetime'          => 7200
            ];

            $adapter = $adapterFactory->newInstance('apcu', $options);
            return new Cache($adapter);
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

        $container->setShared("auth", function () use ($container) {
            $config = $container->getShared('config')->get('auth')->toArray();
            $security = $container->getSecurity();


            $adapter     = new \Sinbadxiii\PhalconAuth\Adapter\Model($security);
            $adapter->setModel(\App\Models\Users::class);

            $guard = new \Sinbadxiii\PhalconAuthJWT\Guard\JWTGuard(
                $adapter,
                $container->getJwt(),
                $container->getRequest(),
                $container->getEventsManager(),
            );

            $manager = new Manager($config);
            $manager->addGuard("jwt", $guard, true);
            $manager->setDefaultGuard($guard);

            // $manager->setAccess(new \App\Security\Access\Jwt());
            // $manager->setAccessList(new Authenticate()->getAccessList());
            // $manager->except("/auth/login");

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
        $this->app->mount(LoginController::routes());
    }
}
