<?php

namespace App\Model;

use Phalcon\Mvc\Model;

class Products extends Model
{
    public $Id;         // Именно так в phpMyAdmin
    public $Name;       // Именно так в phpMyAdmin
    public $CreatedAt; // Именно так в phpMyAdmin

    public function initialize()
    {
        // Указываем таблицу из базы 'shop'
        $this->setSource('created_at');
    }

    // Авто-заполнение даты перед сохранением
    public function beforeCreate()
    {
        $this->CreatedAt = date('Y-m-d H:i:s');
    }
}

