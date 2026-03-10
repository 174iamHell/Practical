<?php

namespace App\Request;

use App\Models\Brands;
use Override;

class BrandsUpdateRequest extends AbstractRequest 
{
    
    #[Override]
    public function validate(object $json): bool
    {
        $brands = Brands::findFirstById($json->id);
        if(!$brands){
            $this->errors[] = 'такого бренда не существует';
        }

        return parent::validate($json);
    }
}
