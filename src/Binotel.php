<?php

namespace Sashalenz\Binotel;

use Sashalenz\Binotel\ApiModels\Customers;
use Sashalenz\Binotel\ApiModels\Stats;

final class Binotel
{
    public static function customers(): Customers
    {
        return new Customers();
    }

    public static function stats(): Stats
    {
        return new Stats();
    }
}
