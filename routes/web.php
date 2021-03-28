<?php

use Illuminate\Support\Facades\Route;
use Sashalenz\Binotel\Http\Controllers\WebhookController;

Route::prefix('binotel-api')
    ->as('binotel-api.')
    ->get('/', WebhookController::class)
    ->name('webhook');
