<?php

namespace Sashalenz\Binotel\Enums;

use Closure;
use Spatie\Enum\Laravel\Enum;

/**
 * @method static self ANSWER()
 * @method static self TRANSFER()
 * @method static self ONLINE()
 * @method static self BUSY()
 * @method static self NOANSWER()
 * @method static self CANCEL()
 * @method static self CONGESTION()
 * @method static self CHANUNAVAIL()
 * @method static self VM()
 * @method static self VM_SUCCESS()
 * @method static self SMS_SENDING()
 * @method static self SMS_SUCCESS()
 * @method static self SMS_FAILED()
 * @method static self SUCCESS()
 * @method static self FAILED()
 **/
final class DispositionEnum extends Enum
{
    protected static function values(): Closure
    {
        return static function (string $name): string {
            return str_replace('_', '-', $name);
        };
    }
}
