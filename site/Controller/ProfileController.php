<?php

namespace Site\Controller;

class ProfileController extends SiteController {

  public function index() {
    $this->view->render('shared/profile/index');
  }

}