<?php

namespace App\Request;

use Override;
use App\Models\Brands;
use App\Models\Categories;

class ProductsCreateRequest extends AbstractRequest
{
    

    #[Override]
    public function validate(object $json): bool
    {
        $brands = new Brands();
        $categories = new Categories();

        if (!isset($json->name) || $json->name !== '') {
            $this->errors[] = 'Поле наименование обязательное';
        } else if (mb_strlen($json->name) <= 255) {
            $this->errors[] = 'Поле наименование должно иметь длину от одного до 255 символов';
        }

        if (!isset($json->mpn) || $json->mpn !== '') {
            $this->errors[] = 'Поле артикул обязательное';
        } else if (mb_strlen($json->mpn) <= 255) {
            $this->errors[] = 'Поле артикул должно иметь длину от одного до 255 символов';
        }

        $brandExists = Brands::findFirst($json->brand_id);
        if(!$brandExists){
            $this->errors[] = 'Такого бренда не существует';
        }
    }
}
