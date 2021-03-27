<?php

namespace Sashalenz\Binotel\DataTransferObjects;

final class CustomerDataTransferObject extends BinotelDataTransferObject
{
    public int $id;
    public string $name;
    public ?string $description = null;
    public string $email;
    public array $assignedToEmployee = [];
    public array $numbers = [];
    public array $labels = [];

    public static function fromArray(array $array): array
    {
        return [
            'id' => $array['id'],
            'name' => $array['name'],
            'description' => $array['description'],
            'email' => $array['email'],
            'assignedToEmployee' => $array['$assignedToEmployee'],
            'numbers' => $array['numbers'],
            'labels' => $array['labels']
        ];
    }
}
