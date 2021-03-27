<?php

namespace Sashalenz\Binotel;

use Sashalenz\Binotel\ApiModels\Customers;

final class Binotel
{
    public static function customers(): Customers
    {
        return new Customers();
    }
}
