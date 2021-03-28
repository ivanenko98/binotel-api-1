<?php

namespace Sashalenz\Binotel\Actions;

use Illuminate\Http\JsonResponse;

interface ActionInterface
{
    public function handle(array $request): JsonResponse;
}
