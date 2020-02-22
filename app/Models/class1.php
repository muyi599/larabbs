<?php
namespace App\Models;

class Class1
{
    protected $log;

    public function __construct(Log $log)
    {
        $this->log = $log;   
    }

    public function login(){
        echo('login success...');
        $this->log->write();
    }
}