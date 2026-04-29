<?php

declare(strict_types=1);

namespace App\Security;

use App\Security\Access\Guest;
use App\Security\Access\Jwt;
use Sinbadxiii\PhalconAuth\Access\Authenticate as AuthMiddleware;

/**
 * Class Authenticate
 * @package App\Security
 */
class Authenticate extends AuthMiddleware
{
    protected array $accessList = [
        'guest'  => Guest::class,
        'auth'  => Jwt::class,
    ];

    public function getAccessList()
    {
        return $this->accessList;
    }
}
