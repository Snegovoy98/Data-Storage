<?php
namespace App;
require_once '../vendor/autoload.php';

use \InMemoryStorageData;
use \JsonKeyValueStorage;
use \YmlKeyValueStorage;

$storage = new InMemoryStorageData();

$storage->set('name','Max');

$storage->clear();

$storageJson = new JsonKeyValueStorage('../data/storage.json');

$storageJson->set('name','Ivan');

$storageJson->has('username');

$storageYml = new YmlKeyValueStorage('../data/storage.yaml');

$storageYml->set('name','Ivan');