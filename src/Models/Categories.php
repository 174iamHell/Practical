<?php

declare(strict_types=1);

namespace App\Models;

use Phalcon\Mvc\Model;

class Categories extends Model
{
    public string $name;
    public string $created_at;
    public $id;


    public function initialize(): void
    {
        // Указываем таблицу из базы 'shop'
        $this->setSource('categories');
    }

    // Авто-заполнение даты перед сохранением
    public function beforeValidationOnCreate(): void
    {
        $this->created_At = date('Y-m-d H:i:s');
    }
}
