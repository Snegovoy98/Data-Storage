<?php

namespace App;

interface KeyValueStorageInterface
{
    public function set(string $key, $value):void ;

    public function get(string $key);

    public function has(string $key):bool;

    public function remove(string $key):void;

    public function clear():void;
}