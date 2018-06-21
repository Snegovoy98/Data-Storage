<?php

namespace App\InMemoryStorageDate;
require_once __DIR__ . '/KeyValueStorageInterface.php';
use KeyValueStorageInterface;

class InMemoryStorageDate implements KeyValueStorageInterface
{
    private $storage =[];


    public function set(string $key, string $value)
    {
        $this->storage[$key]=$value;
    }

    public function get(string $key):string
    {
       $this->storage = $this->storage[$key] ?? false;
       return $this->storage;
    }
    public function has(string $key)
    {
       return isset($this->storage[$key]);
    }

    public function remove(string $key)
    {
        if ($this->has($key)){
            unset($this->storage[$key] );
        }


    }
    public function clear()
    {
        return $this->storage=[];
    }
}
