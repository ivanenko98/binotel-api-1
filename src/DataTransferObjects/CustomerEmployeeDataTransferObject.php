<?php

namespace Sashalenz\Binotel\DataTransferObjects;

final class CustomerEmployeeDataTransferObject extends BinotelDataTransferObject
{
    public int $id;
    public string $name;
    public int $internalNumber;
    public string $email;

    public static function fromArray(array $array): self
    {
        return new self([
            'id' => (int) $array['id'],
            'name' => $array['name'],
            'internalNumber' => (int) $array['internalNumber'],
            'email' => $array['email']
        ]);
    }
}
