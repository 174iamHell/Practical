<?php

namespace App\Request;

use App\Filters\FloatFilter;
use App\Filters\StringsFilter;
use Override;
use App\Models\Brands;

class ProductsUpdateRequest extends AbstractRequest
{


    #[Override]
    public function validate(object $json): bool
    {
        $filtersString = new StringsFilter();
        $filtersFloat = new FloatFilter();

        if (!$filtersString->existence($json->name)) {
            $this->errors[] = 'Поле наименование обязательное';
        } else if (!$filtersString->range($json->name, 1, 255)) {
            $this->errors[] = 'Поле наименование должно иметь длину от одного до 255 символов';
        }

        if (!$filtersString->existence($json->mpn)) {
            $this->errors[] = 'Поле артикул обязательное';
        } else if (!$filtersString->range($json->mpn, 1, 255)) {
            $this->errors[] = 'Поле артикул должно иметь длину от одного до 255 символов';
        }

        if (!$filtersFloat->existence($json->brand_id)) {
            $this->errors[] = 'Поле Бренд обязательное';
        } else {
            $brandExists = Brands::findFirst($json->brand_id);
            if ($brandExists) {
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
