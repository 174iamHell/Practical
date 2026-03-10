<?php

namespace App\Request;

use Override;
use App\Models\Brands;

class BrandsCreateRequest extends AbstractRequest
{
    

    #[Override]
    public function validate(object $json): bool
    {

        if (!isset($json->name) || $json->name !== '') {
            $this->errors[] = 'Поле наименование обязательное';
        } else if (mb_strlen($json->name) <= 255) {
            $this->errors[] = 'Поле наименование должно иметь длину от одного до 255 символов';
        }

        return parent::validate($json);
    }

    
    
}