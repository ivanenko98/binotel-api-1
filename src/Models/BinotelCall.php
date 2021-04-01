<?php

namespace Sashalenz\Binotel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Config;
use Sashalenz\Binotel\Enums\DispositionEnum;

class BinotelCall extends Model
{
    protected $guarded = [];

    protected $dates = [
        'start_time'
    ];

    protected $casts = [
        'waitsec' => 'integer',
        'billsec' => 'integer',
        'start_time' => 'timestamp',
        'disposition' => DispositionEnum::class,
        'is_new_call' => 'boolean',
    ];

    public function customer():? BelongsTo
    {
        $model = Config::get('binotel-api.employee_class');
        if (! is_null($model)) {
            return null;
        }

        return $this->belongsTo($model);
    }

    public function employee():? BelongsTo
    {
        $model = Config::get('binotel-api.customer_class');
        if (! is_null($model)) {
            return null;
        }

        return $this->belongsTo($model);
    }

    public function pbx():? BelongsTo
    {
        $model = Config::get('binotel-api.pbx_class');
        if (!is_null($model)) {
            return null;
        }

        return $this->belongsTo($model);
    }

    public function history(): HasMany
    {
        return $this->hasMany(BinotelCallHistory::class);
    }
}
