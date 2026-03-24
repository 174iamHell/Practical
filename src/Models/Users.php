<?php

declare(strict_types=1);

namespace App\Models;

use Phalcon\Mvc\Model;
use Sinbadxiii\PhalconAuthJWT\JWTSubject;

class Users extends Model implements JWTSubject
{
    public $id;
    public string $name;
    public string $user_name;
    public string $email;
    public string $password;
    public string $created_at;

    public function initialize(): void
    {
        // Указываем таблицу из базы 'shop'
        $this->setSource('users');
    }

    // Авто-заполнение даты перед сохранением
    public function beforeValidationOnCreate(): void
    {
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function getJWTIdentifier()
    {
        return $this->id;
    }

    public function getJWTCustomClaims()
    {
        return [
            "email" => $this->email,
            "username" => $this->username
        ];
    }
}
