<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 21.06.2018
 * Time: 15:27
 */
namespace App\InMemoryStorageDate;
require __DIR__ . '/KeyValueStorageInterface .php';

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
