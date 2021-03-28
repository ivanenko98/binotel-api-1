<?php

namespace Sashalenz\Binotel\DataTransferObjects;

use Illuminate\Support\Collection;

final class StatDataTransferObject extends BinotelDataTransferObject
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
    public string $disposition;
    public bool $isNewCall;
    public ?array $customerData = null;
    public ?EmployeeDataTransferObject $employeeData = null;
    public PbxNumberDataTransferObject $pbxNumberData;
    public Collection $historyData;
    public ?CallTrackingDataTransferObject $callTrackingData = null;
    public ?GetCallDataTransferObject $getCallData = null;
    public ?string $smsContent = null;

    public static function fromArray(array $array): self
    {
        return new self([
            'companyID' => (int) $array['companyID'],
            'generalCallID' => (int) $array['generalCallID'],
            'startTime' => (int) $array['startTime'],
            'callType' => (int) $array['callType'],
            'internalNumber' => ! is_null($array['internalNumber'])
                ? (int) $array['internalNumber']
                : null,
            'internalAdditionalData' => $array['internalAdditionalData'],
            'externalNumber' => $array['externalNumber'],
            'waitsec' => (int) $array['waitsec'],
            'billsec' => (int) $array['billsec'],
            'disposition' => $array['disposition'],
            'isNewCall' => (bool) $array['isNewCall'],
            'customerData' => is_array($array['customerData'])
                ? $array['customerData']
                : null,
            'employeeData' => ! empty($array['employeeData'])
                ? EmployeeDataTransferObject::fromArray($array['employeeData'])
                : null,
            'pbxNumberData' => PbxNumberDataTransferObject::fromArray($array['pbxNumberData']),
            'historyData' => HistoryDataTransferObject::collectFromArray($array['historyData']),
            'callTrackingData' => isset($array['callTrackingData'])
                ? CallTrackingDataTransferObject::fromArray($array['callTrackingData'])
                : null,
            'getCallData' => isset($array['getCallData'])
                ?  CallTrackingDataTransferObject::fromArray($array['getCallData'])
                : null,
            'smsContent' => $array['smsContent'] ?? null,
        ]);
    }
}
