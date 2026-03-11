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

    public function errorOutput(): string
    {
        return json_encode(['errors' => $this->errors, 'success' => false]);
    }
}
