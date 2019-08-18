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

    $getParams = $this->request->get;

    $this->load->model('Desk');
    $this->load->model('Page', false, 'Admin');

    $user_id = $this->data['user']->id;
    $data['desk'] = $this->model->desk->getDesk($segment, $user_id);
    $data['user_id'] = $user_id;
    $desk_id = $data['desk']->id;

    if (isset($getParams['page'])) {
      $data['page'] = $this->model->page->getPageBySegmentAndUserId($getParams['page'], $user_id);
      $data['colors'] = ["#18abd5", "#3f4573", "blue", "green"];
    } else {
      $data['pages'] = $this->model->page->getPagesByDeskId($desk_id);
    }

    $this->view->render('desk', $data);
  }

}
?>
