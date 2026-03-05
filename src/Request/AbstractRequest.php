<?php

namespace App\Request;

abstract class AbstractRequest
{
    /** @var string[] */
    public protected(set) array $errors;

    public abstract function validate(object $json): bool;
}
