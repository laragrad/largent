<?php

namespace Laragrad\Largent\Facades;

use Illuminate\Support\Facades\Facade;

class EntryServiceFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Laragrad\Largent\Services\EntryService::class;
    }
}
