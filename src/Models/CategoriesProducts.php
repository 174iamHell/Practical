<?php

declare(strict_types=1);

namespace App\Models;

use Phalcon\Mvc\Model;

class Categories extends Model
{
    public int $id;         
    public int $category_id;      
    public int $product_id;
    public  string $created_at;

    public function initialize():void
    {
        // Указываем таблицу из базы 'shop'
        $this->setSource('categories_products');
    }

    // Авто-заполнение даты перед сохранением
    public function beforeCreate():void
    {
        $this->created_at = date('Y-m-d H:i:s');
    }
}