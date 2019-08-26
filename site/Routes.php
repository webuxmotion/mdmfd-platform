<?php
  $this->router->add('home', '/', 'HomeController:index');
  $this->router->add('login', '/login/', 'LoginController:login');
  $this->router->add('register', '/register/', 'LoginController:register');
  $this->router->add('authenticate', '/authenticate/', 'LoginController:authenticate', 'POST');
  $this->router->add('register-post', '/register/', 'LoginController:registerUser', 'POST');
  $this->router->add('logout', '/logout/', 'LogoutController:logout');
  $this->router->add('desk-view', '/(id:any)', 'DeskController:view');
  $this->router->add('desk-add', '/desk/add/', 'DeskController:add', 'POST');
  $this->router->add('edit-desk', '/desk/edit/(slug:any)', 'DeskController:edit');
  $this->router->add('update-desk', '/desk/update/', 'DeskController:update', 'POST');

  $this->router->add('page-update', '/page/update/', 'PageController:update', 'POST');
  $this->router->add('page-create', '/page/create/', 'PageController:create', 'POST');
  $this->router->add('page-delete', '/page/delete/', 'PageController:delete', 'POST');
?>
