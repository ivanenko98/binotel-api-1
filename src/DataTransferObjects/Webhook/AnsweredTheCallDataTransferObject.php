<?php

namespace Sashalenz\Binotel\DataTransferObjects\Webhook;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class AnsweredTheCallDataTransferObject extends DataTransferObject
{
    public ?string $pbxNumber = null;
    public string $externalNumber;
    public ?int $internalNumber = null;
    public int $generalCallID;
    public int $callType;
    public int $companyID;
    public string $requestType;

    public static function fromRequest(Request $request): self
    {
        return new self([
            'requestType' => $request->input('requestType'),
            'pbxNumber' => $request->input('pbxNumber'),
            'internalNumber' => (int) $request->input('internalNumber'),
            'externalNumber' => $request->input('externalNumber'),
            'companyID' => (int) $request->input('companyID'),
            'generalCallID' => (int) $request->input('generalCallID'),
            'callType' => (int) $request->input('callType'),
        ]);
    }
}
