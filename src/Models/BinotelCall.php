<?php

namespace Sashalenz\Binotel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Sashalenz\Binotel\Enums\DispositionEnum;

class BinotelCall extends Model
{
    protected $guarded = [];

    protected $casts = [
        'waitsec' => 'integer',
        'billsec' => 'integer',
        'start_time' => 'timestamp',
        'disposition' => DispositionEnum::class,
        'is_new_call' => 'boolean'
    ];

    public function customer(): MorphTo
    {
        return $this->morphTo('customer');
    }

    public function employee(): MorphTo
    {
        return $this->morphTo('customer');
    }
}
