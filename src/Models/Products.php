<?php

declare(strict_types=1);

namespace App\Models;

use Phalcon\Mvc\Model;

class Categories extends Model
{
    public int $brand_id;
    public string $created_at;
    public int $id;
    public int $mnp;        
    public string $name;      

    public function initialize():void
    {
        // Указываем таблицу из базы 'shop'
        $this->setSource('products');
    }

    // Авто-заполнение даты перед сохранением
    public function beforeCreate():void
    {
        $this->created_at = date('Y-m-d H:i:s');
    }
}

