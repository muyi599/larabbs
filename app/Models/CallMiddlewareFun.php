<?php
namespace App\Models;

class CallMiddlewareFun
{
    public function call(){
        $handle = function() {
            echo '当前要执行的程序!';
        };
    
        $pipe_arr = [
            'App\Models\VerfiyCsrfToekn',
            'App\Models\VerfiyAuth',
            'App\Models\SetCookie',
        ];
    
        $callback = array_reduce($pipe_arr,function($stack,$pipe) {
            return function() use($stack,$pipe){
                return $pipe::handle($stack);
            };
        },$handle);
    
        \call_user_func($callback);
    }
}