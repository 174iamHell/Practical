<?php

declare(strict_types=1);

namespace App\Models;

use Phalcon\Mvc\Model;

class Orders extends Model
{
    public int $id;
    public string $created_at;
    public int $user_id;

    public function initialize():void
    {
        // Указываем таблицу из базы 'shop'
        $this->setSource('orders');
    }

    // Авто-заполнение даты перед сохранением
    public function beforeCreate():void
    {
        $this->created_at = date('Y-m-d H:i:s');
    }
}