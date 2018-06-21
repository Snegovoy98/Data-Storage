<?php


interface KeyValueStorageInterface
{
    public function set(string $key, string$value);
    public function get(string $key);
    public function has(string $key);
    public function remove(string $key);
    public function clear();



}