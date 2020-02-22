<?php
namespace App\Models;

class FileLog implements Log
{
    public function write(){
        echo('file log write...');
    }
}