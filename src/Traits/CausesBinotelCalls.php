<?php

namespace Sashalenz\Binotel\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Sashalenz\Binotel\Models\BinotelCall;

trait CausesBinotelCalls
{
    public function binotelCalls(): HasMany
    {
        return $this->hasMany(BinotelCall::class, 'employee_id');
    }
}
