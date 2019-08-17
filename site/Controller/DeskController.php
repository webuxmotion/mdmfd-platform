<?php

namespace Site\Controller;

class DeskController extends SiteController {

  public function add() {

    $params = $this->request->post;

    $this->load->model('Desk');
    $deskId = $this->model->desk->add($params);

    if (isset($params['redirect'])) {
        header('Location: ' . $params['redirect']);
        exit;
    }
    
    echo $deskId;
  }

  public function view($segment) {
    $data['segment'] = $segment;
    $this->view->render('desk', $data);
  }

}
?>