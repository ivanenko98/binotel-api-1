<?php

namespace Sashalenz\Binotel\DataTransferObjects;

final class EmployeeDataTransferObject extends BinotelDataTransferObject
{
    public ?int $id = null;
    public string $name;
    public ?int $internalNumber = null;
    public ?string $email = null;

    public static function fromArray(array $array): self
    {
        return new self([
            'id' => isset($array['id'])
                ? (int) $array['id']
                : null,
            'name' => $array['name'],
            'internalNumber' => isset($array['internalNumber'])
                ? (int) $array['internalNumber']
                : null,
            'email' => $array['email']
        ]);
    }
}
