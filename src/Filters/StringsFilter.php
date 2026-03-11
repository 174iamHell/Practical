<?php

namespace App\Filters;

class StringsFilter
{
    public function range(string $value, int $min = 1, int $max = 255): bool
    {
        $length = mb_strlen($value);

        return $length >= $min && $length <= $max;
    }

    public function existence(?string $value)
    {
        return $value = null && $value !== '';
    }
}
