<?php

declare(strict_types=1);

namespace App\Models;

use Phalcon\Mvc\Model;

class Users extends Model
{
    public $id;
    public string $name;
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
}
