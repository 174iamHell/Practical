<?php

declare(strict_types=1);

namespace App\Models;

use Phalcon\Mvc\Model;

class Users extends Model
{
    public int $id;
    public string $name;
    public string $creared_at;


    public function initialize(): void
    {
        // Указываем таблицу из базы 'shop'
        $this->setSource('users');
    }

    // Авто-заполнение даты перед сохранением
    public function beforeCreate(): void
    {
        $this->created_at = date('Y-m-d H:i:s');
    }
}
