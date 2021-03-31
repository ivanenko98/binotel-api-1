<?php

namespace Sashalenz\Binotel\Actions;

use Illuminate\Http\JsonResponse;
use Sashalenz\Binotel\DataTransferObjects\ApiCallSettingsDataTransferObject;

interface ActionInterface
{
    public function handle(ApiCallSettingsDataTransferObject $call): JsonResponse;
}
