<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/Functions.php';

class_alias('Core\\Worker\\Router\\Router', 'Router');
class_alias('Core\\Worker\\Template\\Asset', 'Asset');
class_alias('Core\\Worker\\Template\\Theme', 'Theme');

use Core\DI;
use Core\Starter;

try {

  $di = new DI();
  session_start();

  $providers = require __DIR__ . '/Provider/providerList.php';

  foreach($providers as $item) {
    $provider = new $item($di);
    $provider->init();
  }

  $starter = new Starter($di);
  $starter->run();

} catch(\ErrorException $e) {
  echo $e->getMessage();
}

?>
