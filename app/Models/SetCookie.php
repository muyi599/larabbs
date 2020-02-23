<?php 
namespace App\Models;
use Closure;

class SetCookie implements Middleware {
    public static function handle(Closure $next)
    {
        $next();
        echo '设置cookie信息！';
    }
}