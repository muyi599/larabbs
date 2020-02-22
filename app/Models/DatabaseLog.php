<?php
namespace App\Models;

class DatabaseLog implements Log
{
    public function write(){
        echo('database log write...');
    }
}