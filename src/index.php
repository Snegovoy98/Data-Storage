<?php

require __DIR__ . '/InMemoryStorageDate.php';

$storage = new \App\InMemoryStorageDate\InMemoryStorageDate();
$storage->set(1,'Ivan');

