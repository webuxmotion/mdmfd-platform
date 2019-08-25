<?php

namespace Core;

use Core\Helper\Common;
use Core\Worker\Router\Router;

class Starter {

  private $di;
  public $router;

  public function __construct($di) {
    $this->di = $di;
    $this->router = $this->di->get('router');
  }

  public function run() {

    try {
      $this->initRoutes();
      
    } catch (\Exception $e) {
      echo $e->getMessage();
      exit;
    }

  }

  public function initRoutes() {
      require_once __DIR__ . '/../' . mb_strtolower(ENV) . '/Routes.php';

      $query = Common::getQuery();
      Router::dispatch($query, $this->di);
  }
}

?>
