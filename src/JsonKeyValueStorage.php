<?php

namespace App;

use KeyValueStorageInterface;

class JsonKeyValueStorage implements KeyValueStorageInterface
{
    private $storage =[];

    private $pathToFile;

    public function __construct(string $pathToFile)
    {
        $this->pathToFile = $pathToFile;
    }

    public function set(string $key, $value):void
    {
        $this->storage[$key]=$value;
       $this->writeToFile($this->storage[$key]);
    }

    public function get(string $key)
    {

         return $this->storage[$key];

    }

    public function has(string $key):bool
    {
        $this->storage=$this->decodeData();
        return $this->storage[$key]?? false;
    }

    public function remove(string $key):void
    {
        if ($this->has($key)){
            unset($this->storage[$key]);
        }
    }

    public function clear():void
    {
        $this->storage=[];
    }

    private function encodeData(string $string)
    {
        return json_encode($string);
    }

    private function writeToFile(string $string)
    {
        file_put_contents($this->pathToFile,$this->encodeData($string));
    }

    private function readFromFile()
    {
        return file_get_contents($this->pathToFile);
    }

    private function decodeData()
    {
        return json_decode($this->readFromFile(),true);
    }

}
