<?php
namespace App\Models;

class Ioc
{
    public $binding = [];

    public function bind($abstract,$concrete){
        $this->binding[$abstract]['concrete'] = function($ioc)use($concrete){
            return $ioc->build($concrete);
        };
    }

    public function build($concrete)
    {
        $reflector = new \ReflectionClass($concrete);
        $constructor = $reflector->getConstructor();
        if(is_null($constructor)){
            return $reflector->newInstance();
        }else{
            $denpendencies = $constructor->getParameters();
            $instances = $this->getDenpendencies($denpendencies);
            return $reflector->newInstanceArgs($instances);
        }
    }

    protected function getDenpendencies($parameters)
    {
        $denpendencies = [];
        foreach($parameters as $parameter){
            $denpendencies[] = $this->make($parameter->getClass()->name);
        }
        return $denpendencies;
    }

    public function make($abstract)
    {
        $concrete = $this->binding[$abstract]['concrete'];
        return $concrete($this);
    }
}