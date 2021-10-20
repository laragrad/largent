<?php

namespace Laragrad\Largent\Facades;

use Illuminate\Support\Facades\Facade;

class OperationServiceFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Laragrad\Largent\Services\OperationService::class;
    }
}
