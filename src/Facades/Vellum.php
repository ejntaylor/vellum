<?php

namespace Ejntaylor\Vellum\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ejntaylor\Vellum\Vellum
 */
class Vellum extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ejntaylor\Vellum\Vellum::class;
    }
}
