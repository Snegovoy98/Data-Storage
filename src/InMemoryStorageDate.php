<?php

namespace App\InMemoryStorageDate;

require_once __DIR__ . '/KeyValueStorageInterface.php';

use  KeyValueStorageInterface;

class InMemoryStorageDate implements KeyValueStorageInterface
{

    private $storage =[];


    public function set(string $key, $value):void
    {
        $this->storage[$key]=$value;
    }

    public function get(string $key)
    {
        return  $this->storage[$key] ?? false;

    }

    public function has(string $key):bool
    {
       return $this->storage[$key]?? false;
    }

    public function remove(string $key):void
    {
        if ($this->has($key)){
            unset($this->storage[$key] );
        }
    }

    public function clear():void
    {
         $this->storage=[];
    }

}
