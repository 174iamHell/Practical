<?php

declare(strict_types=1);

namespace App\Models;

use Phalcon\Mvc\Model;

class Brands extends Model
{
    public  $id;         // Именно так в phpMyAdmin
    public  string $name;       // Именно так в phpMyAdmin
    public string $created_at; // Именно так в phpMyAdmin

    public function initialize(): void
    {
        // Указываем таблицу из базы 'shop'
        $this->setSource('brands');
    }

    // Авто-заполнение даты перед сохранением
    public function beforeValidationOnCreate(): void
    {
        $this->created_at = date('Y-m-d H:i:s');
    }
}
