<?php

require_once '../vendor/autoload.php';

use App\{InMemoryStorageData,JsonKeyValueStorage,YmlKeyValueStorage};

$storage = new InMemoryStorageData();

$storage->set('array', ['style'=>'css','script'=>'js']);

$storage->get('array');

$storageJson = new JsonKeyValueStorage('../data/storage.json');

$storageJson->set('object', new YmlKeyValueStorage('../data/storage.yaml'));

$storageJson->get('object');

$storageYml = new YmlKeyValueStorage('../data/storage.yaml');

$storageYml ->set('name', 'yra');

$storageYml->clear();

echo $storageYml->get('name');