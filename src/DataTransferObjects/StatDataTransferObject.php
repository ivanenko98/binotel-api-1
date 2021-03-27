<?php

namespace Sashalenz\Binotel\DataTransferObjects;

use Sashalenz\Binotel\Enums\DispositionEnum;

class StatDataTransferObject extends BinotelDataTransferObject
{
    public int $companyID;
    public int $generalCallID;
    public int $startTime;
    public int $callType;
    public int $internalNumber;
    public string $internalAdditionalData;
    public string $externalNumber;
    public int $waitsec;
    public int $billsec;
    public DispositionEnum $disposition;
    public bool $isNewCall;
    public array $customerData;
    public array $employeeData;
    public array $pbxNumberData;
    public array $historyData;
    public array $callTrackingData; //todo
    public array $getCallData; //todo
    public string $smsContent;

    public static function fromArray(array $array): self
    {
        return new self([
            'companyID' => (int) $array['companyID'],
            'generalCallID' => (int) $array['generalCallID'],
            'startTime' => (int) $array['startTime'],
            'callType' => (int) $array['callType'],
            'internalNumber' => (int) $array['internalNumber'],
            'internalAdditionalData' => $array['internalAdditionalData'],
            'externalNumber' => $array['externalNumber'],
            'waitsec' => (int) $array['waitsec'],
            'billsec' => (int) $array['billsec'],
            'disposition' => $array['disposition'],
            'isNewCall' => (bool) $array['isNewCall'],
            'customerData' => isset($array['customerData'])
                ? CustomerDataTransferObject::fromArray($array['customerData'])
                : null,
            'employeeData' => isset($array['employeeData'])
                ? EmployeeDataTransferObject::fromArray($array['employeeData'])
                : null,
            'pbxNumberData' => isset($array['pbxNumberData'])
                ? PbxNumberDataTransferObject::fromArray($array['pbxNumberData'])
                : null,
            'historyData' => isset($array['historyData'])
                ? HistoryDataTransferObject::fromArray($array['historyData'])
                : null,
            'callTrackingData' => isset($array['callTrackingData'])
                ? CallTrackingDataTransferObject::fromArray($array['callTrackingData'])
                : null,
            'getCallData' => isset($array['getCallData'])
                ? CallTrackingDataTransferObject::fromArray($array['getCallData'])
                : null,
            'smsContent' => $array['smsContent']
        ]);
    }
}
