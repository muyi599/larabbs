<?php 
namespace App\Models;
use Closure;

class VerfiyAuth implements Middleware
{
    public static function handle(Closure $next)
    {
        echo '验证是否登录 <br>';
        $next();
    }
}