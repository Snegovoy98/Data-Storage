<?php

namespace App;

use  App\KeyValueStorageInterface;

class InMemoryStorageData implements KeyValueStorageInterface
{
    private $storage = [] ;

    public function set(string $key, $value) :void
    {
       $this->storage[$key] = $value;

    }

    public function get(string $key)
    {
       if ($this->has($key)) {
          return $this->storage[$key];
       } else {
           return 'key not found';
       }
    }

    public function has(string $key) :bool
    {
       if (isset($this->storage[$key])) {
           return true;
       } else {
           return false;
       }
    }

    public function remove(string $key) :void
    {
        if ($this->has($key)) {
            unset($this->storage[$key]);
        }
    }

    public function clear() :void
    {
         $this->storage=[];
    }
}
