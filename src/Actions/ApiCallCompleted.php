<?php

namespace Sashalenz\Binotel\Actions;

use Illuminate\Http\JsonResponse;

class ApiCallCompleted implements ActionInterface
{

    public function handle(array $request): JsonResponse
    {
        // TODO: Implement handle() method.

        return response()->json([]);
    }
}
