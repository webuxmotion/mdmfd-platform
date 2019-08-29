<?php

namespace Site\Controller;

class HomeController extends SiteController {

  public function index() {

    $this->load->model('Desk');
    $user_id = $this->data['user']->id;
    $data['user_id'] = $user_id;
    $data['desks'] = $this->model->desk->getDesksByUserId($user_id);

    $this->view->render('index', $data);
  }

  public function webpackTest() {
    $this->view->render('webpack-test');
  }

}

?>
