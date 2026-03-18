<?php

namespace App\Request;

use App\Filters\StringsFilter;
use App\Models\Users;
use Override;

class UsersUpdateRequest extends AbstractRequest
{


    #[Override]
    public function validate(object $json): bool
    {
        $filters = new StringsFilter();

        if (!$filters->existence($json->name)) {
            $this->errors[] = 'Поле наименование обязательное';
        } else if (!$filters->range($json->name, 1, 255)) {
            $this->errors[] = 'Поле наименование должно иметь длину от одного до 255 символов';
        }

        if (!Users::findFirst($json->id)) {
            $this->errors[] = 'Такого пользователя не существует';
        }

        return parent::validate($json);
    }
}
