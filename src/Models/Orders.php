<?php

declare(strict_types=1);

namespace App\Models;

use App\Enum\OrderStatus;
use Phalcon\Mvc\Model;

class Orders extends Model
{
    public  $id;
    public string $created_at;
    public int $user_id;
    public int $status;

    public function initialize(): void
    {
        // Указываем таблицу из базы 'shop'
        $this->setSource('orders');
    }

    // Авто-заполнение даты перед сохранением
    public function beforeValidationOnCreate(): void
    {
        $this->status = OrderStatus::Created->value;
        $this->created_at = date('Y-m-d H:i:s');
    }
}
