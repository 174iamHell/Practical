<?php

namespace App\Request;

class ProductsCreateRequest extends AbstractRequest
{
    public function validate(object $json): bool
    {
        if (isset($json->name) && $json->name !==' ' &&   mb_strlen($json->name)<= 255) {
            if(isset($json->mpn) && $json->mpn !==' ' &&  mb_strlen($json->name)<= 255)
                {
                    return true;
                }
            else
                {
                    $errors[] = "не верно введен MPN";
                    return false;
                }    
        }
        else{
            if(!isset($json->mpn) || $json->mpn !==' ' ||  mb_strlen($json->name)<= 255)
                {
                    $errors[] = "не верно введен MPN";
                }
            $errors[] = "не верно введено имя";
            return false;
        }
    }
}
