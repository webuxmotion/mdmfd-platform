<?php
  $this->router->add('home', '/', 'HomeController:index');
  $this->router->add('login', '/login/', 'LoginController:login');
  $this->router->add('authenticate', '/authenticate/', 'LoginController:authenticate', 'POST');
  $this->router->add('logout', '/logout/', 'LogoutController:logout');
  $this->router->add('desk-view', '/(id:any)', 'DeskController:view');

  $this->router->add('desk-add', '/desk/add/', 'DeskController:add', 'POST');
?>