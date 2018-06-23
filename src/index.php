<?php
namespace App;
require_once '../vendor/autoload.php';

use App\{InMemoryStorageData,JsonKeyValueStorage,YmlKeyValueStorage};


$storage = new InMemoryStorageData();

$storage->set('name','Max');

$storage->clear();

$storageJson = new JsonKeyValueStorage('../data/storage.json');

$storageJson->set('name','Ivan');



$storageJson->clear();

$storageJson->get('name');

$storageYml = new YmlKeyValueStorage('../data/storage.yaml');

$storageYml->set('name','Ivan');

$storageYml->get('name');

$storageYml->has('name');

$storageYml->remove('name');

$storageYml->has('name');

$storageYml->clear();

$storageYml->get('name');