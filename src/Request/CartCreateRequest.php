<?php

namespace App\Request;

use App\Models\Products;
use App\Models\Users;
use Override;

class CartsCreateRequest extends AbstractRequest
{


    #[Override]
    public function validate(object $json): bool
    {
        if (!Products::findFirst($json->product_id)) {
            $this->errors[] = 'Такого продукта не существует';
        }
        if (!Users::findFirst($json->user_id)) {
            $this->errors[] = 'Такого пользователя не существует';
        }

        return parent::validate($json);
    }
}
