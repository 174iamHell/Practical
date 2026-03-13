<?php

declare(strict_types=1);

namespace App\Models;

use Phalcon\Mvc\Model;

class Products extends Model
{
    public int $brand_id;
    public string $created_at;
    public  $id;
    public int $mnp;
    public string $name;
    public float $price;

    public function initialize(): void
    {
        // Указываем таблицу из базы 'shop'
        $this->setSource('products');
    }

    // Авто-заполнение даты перед сохранением
    public function beforeValidationOnCreate(): void
    {
        $this->created_at = date('Y-m-d H:i:s');
    }
}
