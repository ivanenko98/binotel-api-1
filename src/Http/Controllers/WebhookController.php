<?php

namespace Sashalenz\Binotel\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class WebhookController
{
    public function __invoke(Request $request): JsonResponse
    {
        $actionClass = Config::get('binotel-api.actions.'.$request->input('requestType'));

        if (! $actionClass || ! method_exists($actionClass, 'handle')) {
            abort(404);
        }

        return app($actionClass)->handle($request->all());
    }
}
