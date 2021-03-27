<?php

namespace Sashalenz\Binotel\DataTransferObjects;

use Illuminate\Support\Collection;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

abstract class BinotelDataTransferObject extends FlexibleDataTransferObject
{
    abstract public static function fromArray(array $array);

    public static function collectFromArray(?array $array = []) : Collection
    {
        return collect($array)
            ->map(
                fn (array $parameters) => static::fromArray($parameters)
            )
            ->values();
    }
}
