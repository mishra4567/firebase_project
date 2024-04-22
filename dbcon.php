<?php
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('pomosweb-project-firebase-adminsdk-akp3a-33236068a6.json')
    ->withDatabaseUri('https://pomosweb-project-default-rtdb.firebaseio.com/');
$database = $factory->createDatabase();
