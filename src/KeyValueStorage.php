<?php


interface KeyValueStorage
{
    public function set($key,$value);
    public function get($key);
    public function has($key);
    public function remove($key);

}