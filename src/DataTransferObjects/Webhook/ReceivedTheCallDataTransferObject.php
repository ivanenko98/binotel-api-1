<?php

namespace Sashalenz\Binotel\DataTransferObjects\Webhook;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class ReceivedTheCallDataTransferObject extends DataTransferObject
{
    public ?string $pbxNumber = null;
    public string $externalNumber;
    public ?int $internalNumber = null;
    public int $generalCallID;
    public int $callType;
    public int $companyID;
    public string $requestType;
    public string $method;
    public string $didNumber;
    public string $did;
    public string $srcNumber;

    public static function fromRequest(Request $request): self
    {
        return new self([
            'pbxNumber' => $request->input('pbxNumber'),
            'internalNumber' => (int) $request->input('internalNumber'),
            'externalNumber' => $request->input('externalNumber'),
            'generalCallID' => (int) $request->input('generalCallID'),
            'callType' => (int) $request->input('callType'),
            'companyID' => (int) $request->input('companyID'),
            'requestType' => $request->input('requestType'),
            'method' => $request->input('method'),
            'didNumber' => $request->input('didNumber'),
            'did' => $request->input('did'),
            'srcNumber' => $request->input('srcNumber'),
        ]);
    }
}
