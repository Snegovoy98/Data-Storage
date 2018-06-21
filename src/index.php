<?php

require __DIR__ . '/InMemoryStorageDate.php';

$storage = new \App\InMemoryStorageDate\InMemoryStorageDate();
$storage->set('name','Ivan');
$storage->get('name');
$storage->clear();
echo $storage->get('name');

