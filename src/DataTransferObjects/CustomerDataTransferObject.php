<?php

namespace Sashalenz\Binotel\DataTransferObjects;

use Illuminate\Support\Collection;

final class CustomerDataTransferObject extends BinotelDataTransferObject
{
    public int $id;
    public string $name;
    public ?string $description = null;
    public ?string $email = null;
    public EmployeeDataTransferObject $assignedToEmployee;
    public array $numbers = [];
    public Collection $labels;

    public static function fromArray(array $array): self
    {
        return new self([
            'id' => (int) $array['id'],
            'name' => $array['name'],
            'description' => $array['description'],
            'email' => $array['email'],
            'assignedToEmployee' => EmployeeDataTransferObject::fromArray($array['assignedToEmployee']),
            'numbers' => $array['numbers'],
            'labels' => LabelDataTransferObject::collectFromArray($array['labels'])
        ]);
    }
}
