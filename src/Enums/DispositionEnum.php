<?php

namespace Sashalenz\Binotel\Enums;

use Closure;
use Spatie\Enum\Enum;

/**
 * @method static self ANSWER()	успешный звонок
 * @method static self TRANSFER()	успешный звонок который был переведен
 * @method static self ONLINE()	звонок в онлайне
 * @method static self BUSY()	неуспешный звонок по причине занято
 * @method static self NOANSWER()	неуспешный звонок по причине нет ответа
 * @method static self CANCEL()	неуспешный звонок по причине отмены звонка
 * @method static self CONGESTION()	неуспешный звонок
 * @method static self CHANUNAVAIL()	неуспешный звонок
 * @method static self VM()	голосовая почта без сообщения
 * @method static self VM_SUCCESS()	голосовая почта с сообщением
 * @method static self SMS_SENDING()	SMS сообщение на отправке
 * @method static self SMS_SUCCESS()	SMS сообщение успешно отправлено
 * @method static self SMS_FAILED()	SMS сообщение не отправлено
 * @method static self SUCCESS()	успешно принятый факс
 * @method static self FAILED()	непринятый факс
 **/
class DispositionEnum extends Enum
{
    protected static function values(): Closure
    {
        return static function (string $name): string {
            return str_replace('-', '_', $name);
        };
    }
}
