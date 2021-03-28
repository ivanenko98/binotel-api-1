<?php

namespace Sashalenz\Binotel\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebhookController
{
    public function __invoke(Request $request): JsonResponse
    {
        if (! method_exists($this, $request->input('requestType'))) {
            abort(404);
        }

        return call_user_func(
            $request->input('requestType'),
            $request->all()
        );
    }

    private function apiCallSettings(array $params): JsonResponse
    {
        info(print_r($params, 1));

        return response()->json([]);
    }

    private function apiCallCompleted(array $params): JsonResponse
    {
        info(print_r($params, 1));

        return response()->json([]);
    }
}
