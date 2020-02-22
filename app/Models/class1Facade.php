<?php
namespace App\Models;
class class1Facade
{
    protected static $ioc;

    public static function setFacadeIoc($ioc)
    {
        static::$ioc = $ioc;
    }

    protected static function getFacadeAccessor()
    {
        return 'class1';
    }

    public static function __callStatic($method,$args)
    {
        $instance = static::$ioc->make(static::getFacadeAccessor());
        return $instance->$method(...$args);
    }
}