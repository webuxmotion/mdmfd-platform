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

  public function view() {

    $segment = $this->route['segment'];

    $getParams = $this->request->get;

    $this->load->model('Desk');
    $this->load->model('Page');

    $user_id = $this->data['user']->id;
    $data['desk'] = $this->model->desk->getDesk($segment, $user_id);
    $data['desks'] = $this->model->desk->getDesksByUserId($user_id);
    $data['user_id'] = $user_id;

    if ($data['desk']) {
      $desk_id = $data['desk']->id;
    } else {
      $data['desk'] = null;
    }

    if (isset($getParams['page'])) {
      $data['page'] = $this->model->page->getPageBySegmentAndUserId($getParams['page'], $user_id);
      $data['colors'] = ["#18abd5", "#3f4573", "blue", "green"];
    } else {
      if ($data['desk']) {
        $data['pages'] = $this->model->page->getPagesByDeskId($desk_id);
      } else {
        $data['pages'] = null;
      }
    }

    $this->view->render('desk', $data);
  }

  public function edit() {

    $slug = $this->route['segment'];

    $user_id = $this->data['user']->id;
    $data['slug'] = $slug;
    $this->load->model('Desk');
    $data['desk'] = $this->model->desk->getDesk($slug, $user_id);
    $data['desks'] = $this->model->desk->getDesksByUserId($user_id);

    $this->view->render('desk/edit', $data);
  }

  public function update() {
    $params = $this->request->post;
    $this->load->model('Desk');
    $this->model->desk->update($params);
  }

}