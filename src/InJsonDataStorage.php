<?php

namespace App\InJsonDataStorage;
require __DIR__ . '/KeyValueStorageInterface .php';
use KeyValueStorageInterface;

class InJsonDataStorage implements KeyValueStorageInterface
{
    private $storage =[];
    public function set($key,$value)
    {
        $this->storage[$key]=$value;
       $json =json_encode($this->storage);
       file_put_contents('../files/storage.json',$json);
    }

    public function get($key)
    {
        $json=file_get_contents('../files/storage.json');
        $this->storage = json_decode($json,true);
             if(isset($this->storage[$key])){
            return $this->storage[$key];
        }
        return null;
    }
    public function has($key)
    {
        $json=file_get_contents('../files/storage.json');
        $this->storage = json_decode($json,true);
        if (isset($this->storage[$key])){
            return 'key isset '.PHP_EOL;
        }
        return new \Exception('key not found'.PHP_EOL);
    }

    public function remove($key)
    {
        $json=file_get_contents('../files/storage.json');
        $this->storage = json_decode($json,true);
        if (isset($this->storage[$key])){
            unset($this->storage[$key]);
        }
    }

    public function clear()
    {
        $this->storage=[];
    }
}
