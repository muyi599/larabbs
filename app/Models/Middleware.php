<?php
namespace App\Models;
use Closure;

interface Middleware 
{
    public static function handle(Closure $next);
}