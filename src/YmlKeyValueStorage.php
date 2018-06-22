<?php

namespace App;

use KeyValueStorageInterface;

use Symfony\Component\Yaml\Yaml;

class YmlKeyValueStorage implements KeyValueStorageInterface
{
    private $storage =[];

    private $pathToFile;


    public function __construct($pathToFile)
    {
        $this->pathToFile =$pathToFile;
    }

    public function set (string  $key,$value):void
    {
        $this->storage[$key]= $value;

        $this->writeToFile($this->storage);
    }

    public function get (string $key)
    {
        $this->storage=$this->parseYmlInPHP();

        return $this->storage[$key] ?? 'key not found';
    }

    public function has (string  $key):bool
    {
        return $this->storage[$key] ?? false;
    }

    public function remove (string $key):void
    {
        if ($this->has($key)){
            unset($this->storage[$key]);
        }
    }

    public function clear ():void
    {
        $this->storage =[];
    }

    private function dumpInYml(array $array)
    {
       return Yaml::dump($array,1);
    }

    private function writeToFile(array $array)
    {
        file_put_contents($this->pathToFile,$this->dumpInYml($array));
    }

    private function parseYmlInPHP()
    {
        $array = Yaml::parseFile($this->readFromFile());
    }

    private function readFromFile()
    {
        return file_get_contents($this->pathToFile);
    }
}