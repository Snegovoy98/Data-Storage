<?php

namespace App;

use App\KeyValueStorageInterface;

use Symfony\Component\Yaml\Yaml;

use Symfony\Component\Yaml\Exception\ParseException;

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

        return $this->storage[$key] ?? 'key not found';
    }

    public function has (string  $key):bool
    {
        $this->storage=$this->parseYmlInPHP();

        return $this->storage[$key] ?? false;
    }

    public function remove (string $key):void
    {
        if ($this->has($key)){

            unset($this->storage[$key]);

            $fp =fopen($this->pathToFile,'w+');

            foreach ($this->storage as $key_data=> $data){

                if ($key_data==$key){

                    unset($key_data,$data);
                }
            }
            fclose($fp);

        }
    }

    public function clear ():void
    {
        $this->storage =[];

        $fp =fopen($this->pathToFile,'w+');

        foreach ($this->storage as $key_data=> $data){

                unset($key_data,$data);

        }
        fclose($fp);
    }

    private function dumpInYml(array $array)
    {
       return Yaml::dump($array,1);
    }

    private function writeToFile(array $array):void
    {
        file_put_contents($this->pathToFile,$this->dumpInYml($array));
    }

    private function parseYmlInPHP()
    {
      return Yaml::parseFile($this->pathToFile);
    }


}