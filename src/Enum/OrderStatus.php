<?php

namespace App\Enum;

enum OrderStatus: int
{
    case Created = 1;
    case Completed = 2;
    case Cancelled = 3;
}
