<?php

require_once __DIR__ . '/InMemoryStorageDate.php';
require_once __DIR__. '/JsonKeyValueStorage.php';
$storage = new \App\InMemoryStorageDate\InMemoryStorageDate();
//$storageJson = new \App\JsonKeyValueStorage\JsonKeyValueStorage();
//$storageJson->set('name','Ivan');
//echo $storageJson->get('name');