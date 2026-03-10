<?php

namespace App\Request;

abstract class AbstractRequest
{
    /** @var string[] */
    public protected(set) array $errors = [];

    public function validate(object $json): bool
    {
        return count($this->errors) === 0;
    }

    public function errorOutput()
    {
        foreach($this->errors as $error)
            {
                echo($error);
            }
    }

    public function existenceСheck(object $object,string $name,string $desiredName ):bool
    {
        foreach($object->$name as $item)
            {
                if($item==$desiredName)
                    {
                        return true;
                    }
            }
        return false;
    }
}
