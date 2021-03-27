<?php

namespace Sashalenz\Binotel\DataTransferObjects;

use Sashalenz\Binotel\Enums\DispositionEnum;

class HistoryDataTransferObject extends BinotelDataTransferObject
{
    public int $internalNumber;
    public string $internalAdditionalData;
    public array $employeeData;
    public int $waitsec;
    public int $billsec;
    public DispositionEnum $disposition;

    public static function fromArray(array $array): self
    {
        return new self([
            'internalNumber' => (int) $array['internalNumber'],
            'internalAdditionalData' => $array['internalAdditionalData'],
            'employeeData' => isset($array['employeeData'])
                ? EmployeeDataTransferObject::fromArray($array['employeeData'])
                : null,
            'waitsec' => (int) $array['waitsec'],
            'billsec' => (int) $array['billsec'],
            'disposition' => $array['disposition']
        ]);
    }
}
