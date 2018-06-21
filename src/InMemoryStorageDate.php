<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 21.06.2018
 * Time: 15:27
 */
namespace App\InMemoryStorageDate;
require __DIR__.'/KeyValueStorage.php';

use KeyValueStorage;

class InMemoryStorageDate implements KeyValueStorage
{
    private $storage =[];
    public function set($key,$value)
    {
        $this->storage[$key]=$value;
    }

    public function get($key)
    {
        if(isset($this->storage[$key])){
            return $this->storage[$key];
        }
        return null;
    }
    public function has($key)
    {
        if (isset($this->storage[$key])){
            return 'key isset '.PHP_EOL;
        }
        return new \Exception('key not found'.PHP_EOL);
    }

    public function remove($key)
    {
        if (isset($this->storage[$key])){
            unset($this->storage[$key]);
        }
    }
}
