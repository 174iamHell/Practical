<?php

declare(strict_types=1);

namespace App\Models;

use Phalcon\Mvc\Model;

class Carts extends Model
{
    public int $id;
    public string $created_at;
    public int $product_id;
    public int $user_id;  

    public function initialize():void
    {
        $this->setSource('cart');
    }

    public function beforeValidationOnCreate()
    {
        $this->created_at = date('Y-m-d H:i:s');
    }
}


