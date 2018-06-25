<?php

namespace App;

use App\KeyValueStorageInterface;
use \SplFixedArray;

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
       $this->writeToFile($this->storage,'r+');
    }

    public function get(string $key)
    {
         if ($this->has($key)) {
             return $this->storage[$key];
         } else {
             return 'key not found';
         }
    }

    public function has(string $key):bool
    {
        $this->storage = $this->decodeData();
       if (isset($this->storage[$key])) {
            return true;
       } else {
            return false;
       }
    }

    public function remove(string $key):void
    {
        if ($this->has($key)) {
            $content = $this->decodeData();
            foreach ($content as $data_key => $value) {
                if ($data_key == $key) {
                    unset($this->storage[$key]);
                   $this->writeToFile($this->storage,'w+');
                }
            }
        }
    }

    public function clear():void
    {
        $this->storage=[];
        $fp = fopen($this->pathToFile,'w+');
        ftruncate($fp, filesize($this->pathToFile));
        fclose($fp);
    }

    private function encodeData(array $array)
    {
        return json_encode($array);
    }

    private function writeToFile(array $array, $flag):void
    {
        $fp = fopen($this->pathToFile, $flag);
        fwrite($fp, $this->encodeData($array), strlen($this->encodeData($array)));
        fclose($fp);
    }

    private function readFromFile()
    {
        $fp = fopen($this->pathToFile,'r');
        if (filesize($this->pathToFile) > 0) {
        $content = fread($fp, filesize($this->pathToFile));
        fclose($fp);
        return $content;
        } else {
            return 'file is empty';
        }
    }

    private function decodeData()
    {
        return json_decode($this->readFromFile(),true);
    }
}
