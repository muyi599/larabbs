<?php 
namespace App\Models;
use Closure;

class VerfiyCsrfToekn implements Middleware
{
    public static function handle(Closure $next)
    {
        echo '验证csrf Token <br>';
        $next();
    }
}