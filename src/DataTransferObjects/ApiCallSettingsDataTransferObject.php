<?php

namespace Sashalenz\Binotel\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

final class ApiCallSettingsDataTransferObject extends DataTransferObject
{
    public string $requestType;
    public ?string $pbxNumber = null;
    public ?int $internalNumber = null;
    public string $externalNumber;
    public int $companyID;
    public int $callType;

    public static function fromRequest(Request $request): self
    {
        return new self([
            'requestType' => $request->input('requestType'),
            'pbxNumber' => $request->input('pbxNumber'),
            'internalNumber' => !is_null($request->input('internalNumber'))
                ? (int) $request->input('internalNumber')
                : null,
            'externalNumber' => $request->input('externalNumber'),
            'companyID' => (int) $request->input('companyID'),
            'callType' => (int) $request->input('callType')
        ]);
    }
}
