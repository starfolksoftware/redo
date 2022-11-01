<?php

namespace StarfolkSoftware\Redo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \StarfolkSoftware\Redo\Redo
 */
class Redo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \StarfolkSoftware\Redo\Redo::class;
    }
}
