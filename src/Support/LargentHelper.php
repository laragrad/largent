<?php 

namespace Laragrad\Largent\Support;

use DB;
use Laragrad\Largent\Exceptions\LargentException;

class LargentHelper
{
    public static function checkTransactionStarted()
    {
        if (! \DB::connection()->transactionLevel()) {
            throw new LargentException(trans('laragrad/largent::messages.errors.transaction_must_be_started'));
        }
    }
}