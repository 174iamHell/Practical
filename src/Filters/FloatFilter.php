<?php

namespace App\Filters;

class FloatFilter
{
    public function range(float $value, int $min = 1): bool
    {
        return $value >= $min;
    }

    public function existence(?float $value): bool
    {
        return $value !== null;
    }
}
