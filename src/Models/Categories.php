<?php

declare(strict_types=1);

namespace App\Models;

use Phalcon\Mvc\Model;

class Categories extends Model
{
    public int $id;         // Именно так в phpMyAdmin
    public string $name;       // Именно так в phpMyAdmin
    public string $created_At; // Именно так в phpMyAdmin

    public function initialize()
    {
        // Указываем таблицу из базы 'shop'
        $this->setSource('categories');
    }

    // Авто-заполнение даты перед сохранением
    public function beforeCreate()
    {
        $this->Created_At = date('Y-m-d H:i:s');
    }
}

