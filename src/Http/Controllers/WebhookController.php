<?php

namespace Sashalenz\Binotel\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;
use Sashalenz\Binotel\DataTransferObjects\ApiCallSettingsDataTransferObject;
use Sashalenz\Binotel\Http\Requests\WebhookRequest;

class WebhookController
{
    /**
     * @param WebhookRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function __invoke(WebhookRequest $request): JsonResponse
    {
        $actionClass = Config::get('binotel-api.actions.' . $request->input('requestType'));

        if (! $actionClass || ! method_exists($actionClass, 'handle')) {
            abort(404);
        }

        return (new $actionClass)->handle(
            ApiCallSettingsDataTransferObject::fromRequest($request)
        );
    }
}
