<?php

namespace Sashalenz\Binotel\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;
use Sashalenz\Binotel\Http\Requests\WebhookRequest;

class WebhookController
{
    public function __invoke(WebhookRequest $request): JsonResponse
    {
        $actionClass = Config::get('binotel-api.actions.'.$request->input('requestType'));

        if (! $actionClass || ! method_exists($actionClass, 'handle')) {
            abort(404);
        }

        return call_user_func_array(
            [$actionClass, 'handle'],
            $request->all()
        );
    }
}
