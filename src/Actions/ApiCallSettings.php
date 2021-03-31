<?php

namespace Sashalenz\Binotel\Actions;

use Illuminate\Http\JsonResponse;
use Sashalenz\Binotel\DataTransferObjects\ApiCallSettingsDataTransferObject;

class ApiCallSettings implements ActionInterface
{
    public function handle(ApiCallSettingsDataTransferObject $call): JsonResponse
    {
        // TODO: Implement handle() method.

        return response()->json([]);
    }
}
