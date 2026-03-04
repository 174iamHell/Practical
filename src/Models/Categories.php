<?php

declare(strict_types=1);

namespace App\Models;

use Phalcon\Mvc\Model;

class Categories extends Model
{
    public int $Id;         // Именно так в phpMyAdmin
    public string $Name;       // Именно так в phpMyAdmin
    public string $Created_At; // Именно так в phpMyAdmin

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

