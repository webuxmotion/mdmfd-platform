<?php
  Router::add('^logout/?$', ['controller' => 'Logout', 'action' => 'logout']);
  Router::add('^login/?$', ['controller' => 'Login', 'action' => 'login']);
  Router::add('^authenticate/?$', ['controller' => 'Login', 'action' => 'authenticate']);
  Router::add('^register/?$', ['controller' => 'Login', 'action' => 'register']);
  Router::add('^register-user/?$', ['controller' => 'Login', 'action' => 'registerUser']);

  Router::add('^$', ['controller' => 'Home', 'action' => 'index']);

  Router::add('^(?P<segment>[A-Za-z0-9_.-]+)/?$', ['controller' => 'Desk', 'action' => 'view']);
  Router::add('^desk/edit/?(?P<segment>[A-Za-z0-9_.-]+)/?', ['controller' => 'Desk', 'action' => 'edit']);
  Router::add('^desk/add/?$', ['controller' => 'Desk', 'action' => 'add']);
  Router::add('^desk/update/?$', ['controller' => 'Desk', 'action' => 'update']);

  Router::add('^page/update/?$', ['controller' => 'Page', 'action' => 'update']);
  Router::add('^page/create/?$', ['controller' => 'Page', 'action' => 'create']);
  Router::add('^page/delete/?$', ['controller' => 'Page', 'action' => 'delete']);
?>