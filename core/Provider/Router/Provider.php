<?php

namespace Core\Provider\Router;

use Core\Provider\AbstractProvider;
use Core\Worker\Router\Router;

class Provider extends AbstractProvider {

  public $workerName = 'router';

  public function init() {
    $instance = new Router('http://localhost/');

    $this->di->set($this->workerName, $instance);
  }
}

?>
