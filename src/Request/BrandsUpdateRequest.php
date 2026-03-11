<?php

namespace App\Request;

use App\Models\Brands;
use Override;

class BrandsUpdateRequest extends AbstractRequest
{

    #[Override]
    public function validate(object $json): bool
    {

        if (!Brands::findFirstById($json->id)) {
            $this->errors[] = 'такого бренда не существует';
        }

        return parent::validate($json);
    }
}
