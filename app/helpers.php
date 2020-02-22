<?php

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

function make($concrete){

    $reflector = new ReflectionClass($concrete);
    $constructor = $reflector->getConstructor();
    // 为什么这样写的? 主要是递归。比如创建FileLog不需要传入参数。
    if(is_null($constructor)) {
        return $reflector->newInstance();
    }else {
        // 构造函数依赖的参数
        $dependencies = $constructor->getParameters();
        // 根据参数返回实例，如FileLog
        $instances = getDependencies($dependencies);
        return $reflector->newInstanceArgs($instances);
    }

}

function getDependencies($paramters) {
    $dependencies = [];
    foreach ($paramters as $paramter) {
        $dependencies[] = make($paramter->getClass()->name);
    }
    return $dependencies;
}