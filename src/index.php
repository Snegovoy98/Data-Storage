<?php

require_once '../vendor/autoload.php';

use App\{InMemoryStorageData,JsonKeyValueStorage,YmlKeyValueStorage};

$storage = new InMemoryStorageData();

$storage->set('object', new class{});

 $storage->remove('object');

 echo $storage->get('object');























//$storageJson = new JsonKeyValueStorage('../data/storage.json');

//$storageYml = new YmlKeyValueStorage('../data/storage.yaml');

