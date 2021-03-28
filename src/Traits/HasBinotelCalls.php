<?php

namespace Sashalenz\Binotel\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Sashalenz\Binotel\Models\BinotelCall;

trait HasBinotelCalls
{
    public function binotelCalls(): MorphMany
    {
        return $this->morphMany(BinotelCall::class, 'customer');
    }
}