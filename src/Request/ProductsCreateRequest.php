<?php

namespace App\Request;

use App\Filters\FloatFilter;
use App\Filters\StringsFilter;
use Override;
use App\Models\Brands;

class ProductsCreateRequest extends AbstractRequest
{


    #[Override]
    public function validate(object $json): bool
    {
        $filtersFloat = new FloatFilter();
        $filtersString = new StringsFilter();

        if (!$filtersString->existence($json->name)) {
            $this->errors[] = 'Поле наименование обязательное';
        } else if (!$filtersString->range($json->name, 1, 255)) {
            $this->errors[] = 'Поле наименование должно иметь длину от одного до 255 символов';
        }

        if (!$filtersString->existence($json->mnp)) {
            $this->errors[] = 'Поле артикул обязательное';
        } else if (!$filtersString->range($json->mnp, 1, 255)) {
            $this->errors[] = 'Поле артикул должно иметь длину от одного до 255 символов';
        }
        if (!$filtersString->existence($json->brand_id)) {
            $this->errors[] = 'Поле Бренд обязательное';
        } else {
            if (!Brands::findFirst($json->brand_id)) {
                $this->errors[] = 'Такого бренда не существует';
            }
        }
        if (!$filtersFloat->existence($json->price)) {
            $this->errors[] = 'Поле цены обязательно для заполнения';
        }
        if (!$filtersFloat->range($json->price, 1)) {
            $this->errors[] = 'Поле цены должно быть положительным';
        }

        return parent::validate($json);
    }
}
