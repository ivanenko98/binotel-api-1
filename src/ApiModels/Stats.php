<?php

namespace Sashalenz\Binotel\ApiModels;

use Illuminate\Support\Collection;
use Sashalenz\Binotel\DataTransferObjects\StatDataTransferObject;
use Sashalenz\Binotel\Exceptions\BinotelException;

final class Stats extends BaseModel
{
    protected string $model = 'stats';

    /**
     * @param int $startTime
     * @param int $stopTime
     * @return Collection
     * @throws BinotelException
     */
    public function incomingCallsForPeriod(int $startTime, int $stopTime): Collection
    {
        return StatDataTransferObject::collectFromArray(
            $this->method('incoming-calls-for-period')
                ->params([
                    'startTime' => $startTime,
                    'stopTime' => $stopTime
                ])
                ->request()
                ->get('callDetails')
        );
    }
}
