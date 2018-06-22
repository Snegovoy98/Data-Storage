<?php

require_once __DIR__ . '/InMemoryStorageDate.php';
require_once __DIR__. '/JsonKeyValueStorage.php';
$storage = new \App\InMemoryStorageDate\InMemoryStorageDate();
$storage->set('name','Max');
$storage->clear();
echo $storage->get('name');

//$storageJson = new \App\JsonKeyValueStorage\JsonKeyValueStorage();
//$storageJson->set('name','Ivan');
//echo $storageJson->get('name');