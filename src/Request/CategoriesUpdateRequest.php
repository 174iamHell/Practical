<?php

namespace App\Request;

use App\Models\Categories;
use Override;

class CategoriesUpdateRequest extends AbstractRequest
{
    #[Override]
    public function validate(object $json): bool
    {
        $brands = Categories::findFirstById($json->id);
        if(!$brands){
            $this->errors[] = 'такого бренда не существует';
        }

        return parent::validate($json);
    }
}
