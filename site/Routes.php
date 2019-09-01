<?php
  Router::add('^admin$', ['controller' => 'Home', 'action' => 'index', 'prefix' => 'admin']);
  Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

  Router::add('^$', ['controller' => 'Home', 'action' => 'index']);
  Router::add('^(?P<username>[a-z-]+)/?(?P<segment>[a-z-]+)?$', ['controller' => 'Desk', 'action' => 'view']);
?>

