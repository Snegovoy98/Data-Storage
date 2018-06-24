<?php

namespace App;

use App\KeyValueStorageInterface;

class JsonKeyValueStorage implements KeyValueStorageInterface
{
    private $storage = [];
    private $pathToFile;

    public function __construct(string $pathToFile)
    {
        $this->pathToFile = $pathToFile;
    }

    public function set(string $key, $value):void
    {
        $this->storage[$key] = $value;
       $this->writeToFile($this->storage);
    }

    public function get(string $key)
    {
         if ($this->has($key)) {
             return $this->convertToString($this->storage[$key]);
         } else {
             return 'key not found';
         }
    }

    public function has(string $key):bool
    {

        $this->storage=$this->decodeData();
       if (isset($this->storage[$key])) {
            return true;
       } else {
            return false;
       }
    }

    public function remove(string $key):void
    {
        if ($this->has($key)) {
            unset($this->storage[$key]);
            $fp =fopen($this->pathToFile,'w+');
            foreach ($this->storage as $key_data => $data) {
                if ($key_data == $key) {
                    unset($key_data, $data);
                }
            }
            fclose($fp);
        }
    }

    public function clear():void
    {
        $this->storage=[];
        $fp =fopen($this->pathToFile,'w+');
        foreach ($this->storage as $key_data => $data) {
                unset($key_data, $data);
        }
        fclose($fp);
    }

    private function encodeData(array $array)
    {
        return json_encode($array);
    }

    private function writeToFile(array $array)
    {
        file_put_contents($this->pathToFile, $this->encodeData($array));
    }

    private function readFromFile()
    {
        return file_get_contents($this->pathToFile);

    }

    private function decodeData()
    {
        return json_decode($this->readFromFile(),true);
    }

    private function convertToString($value)
    {
        switch ($value) {
            case is_array($value):
                return implode(' ', $value);
                break;
            case is_object($value):
                return serialize($value);
                break;
            default:
                return $value;
        }
    }
}
