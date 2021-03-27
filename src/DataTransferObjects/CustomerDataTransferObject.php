<?php

namespace Sashalenz\Binotel\DataTransferObjects;

use Illuminate\Support\Collection;

final class CustomerDataTransferObject extends BinotelDataTransferObject
{
    public int $id;
    public string $name;
    public ?string $description = null;
    public string $email;
    public ?CustomerEmployeeDataTransferObject $assignedToEmployee = null;
    public array $numbers = [];
    public Collection $labels;

    public static function fromArray(array $array): self
    {
        return new self([
            'id' => $array['id'],
            'name' => $array['name'],
            'description' => $array['description'],
            'email' => $array['email'],
            'assignedToEmployee' => !is_null($array['assignedToEmployee'])
                ? CustomerEmployeeDataTransferObject::fromArray($array['assignedToEmployee'])
                : null,
            'numbers' => $array['numbers'],
            'labels' => LabelDataTransferObject::collectFromArray($array['labels'])
        ]);
    }
}
