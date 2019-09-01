<?php

namespace Site\Controller;

use Core\Controller; 
use Core\Worker\Auth\Auth;

class SiteController extends Controller {

  protected $auth;
  public $data;

  public function __construct($route, $di) {

    parent::__construct($route, $di);

    $this->auth = new Auth($di);

    if (!$this->auth->isRole('user')) {
      header('Location: /login/');
      exit;
    }

    $this->load->model('User');
    $this->data['user'] = $this->model->user->getUserByHash();
  }
}

?>