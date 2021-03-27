<?php

namespace Sashalenz\Binotel\DataTransferObjects;

final class SettingsEmployeeDataTransferObject extends BinotelDataTransferObject
{
    public int $employeeID;
    public string $email;
    public string $name;
    public ?string $mobileNumber = null;
    public string $presenceState;
    public string $department;
    public bool $isAdministrator;
    public bool $crmIsEnabled;
    public bool $chatIsEnabled;
    public bool $callCenterIsEnabled;
    public string $language;
    public EndpointDataTransferObject $endpointData;

    public static function fromArray(array $array): self
    {
        return new self([
            'employeeID' => $array['employeeID'],
            'email' => $array['email'],
            'name' => $array['name'],
            'mobileNumber' => $array['mobileNumber'],
            'presenceState' => $array['presenceState'],
            'department' => $array['department'],
            'isAdministrator' => $array['isAdministrator'],
            'crmIsEnabled' => $array['crmIsEnabled'],
            'chatIsEnabled' => $array['chatIsEnabled'],
            'callCenterIsEnabled' => $array['callCenterIsEnabled'],
            'language' => $array['language'],
            'endpointData' => EndpointDataTransferObject::fromArray($array['endpointData'])
        ]);
    }
}
