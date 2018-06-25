<?php

require_once '../vendor/autoload.php';

use App\{InMemoryStorageData,JsonKeyValueStorage,YmlKeyValueStorage};

$storage = new InMemoryStorageData();

$storage->set('array', ['style'=>'css','script'=>'js']);

$storage->get('array');

$storageJson = new JsonKeyValueStorage('../data/storage.json');

$storageJson->clear();

$storageYml = new YmlKeyValueStorage('../data/storage.yaml');


$storageYml->clear();

