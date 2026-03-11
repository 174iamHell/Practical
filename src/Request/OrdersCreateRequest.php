<?php

namespace App\Request;

use App\Filters\FloatFilter;
use App\Filters\StringsFilter;
use App\Models\Users;

use Override;

class OrdersCreateRequest extends AbstractRequest
{


    #[Override]
    public function validate(object $json): bool
    {

        if (!Users::findFirst($json->user_id)) {
            $this->errors[] = 'Такого пользователя не существует';
        }

        return parent::validate($json);
    }
}
