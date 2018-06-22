<?php

require_once __DIR__ . '/InMemoryStorageData.php';

require_once __DIR__. '/JsonKeyValueStorage.php';

$storage = new \App\InMemoryStorageDate\InMemoryStorageData();

$storage->set('name','Max');

$storage->clear();

$storageJson = new \App\JsonKeyValueStorage\JsonKeyValueStorage('../data/storage.json');

$storageJson->set('name','Ivan');

echo $storageJson->has('username');