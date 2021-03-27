<?php

namespace Sashalenz\Binotel\DataTransferObjects;

class PbxNumberDataTransferObject extends BinotelDataTransferObject
{
    public string $name;
    public string $number;

    public static function fromArray(array $array): self
    {
        return new self([
            'name' => $array['name'],
            'number' => $array['number']
        ]);
    }
}
