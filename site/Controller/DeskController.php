<?php

namespace Site\Controller;

class DeskController extends SiteController {

  public function showAll() {
    $username = $this->route['username'];
    $userFromDB = $this->data['user'];

    $data['username'] = $username;  

    if ($username !== $userFromDB->username) {
      $this->view->render('pages/user-not-exists', $data);
    } else {

      $this->load->model('Desk');

      $data['user'] = $this->data['user'];
      $data['desks'] = $this->model->desk->getDesksByUserId($data['user']->id);
      
      $this->view->render('pages/desks-all', $data);
    }
  }

  public function showDesk() {
    $username = $this->route['username'];
    $deskSegment = $this->route['segment'];
    $userFromDB = $this->data['user'];

    $data['username'] = $username;  

    if ($username !== $userFromDB->username) {
      $this->view->render('pages/user-not-exists', $data);
    } else {
      $this->load->model('Desk');
      $this->load->model('Page');

      $data['user'] = $this->data['user'];
      $user_id = $data['user']->id;
      $data['desks'] = $this->model->desk->getDesksByUserId($user_id);
      $data['desk'] = $this->model->desk->getDesk($deskSegment, $user_id);
      $data['segment'] = $deskSegment;

      if ($data['desk']) {
        $desk_id = $data['desk']->id;
        $data['pages'] = $this->model->page->getPagesByDeskId($desk_id);
      } else {
        $data['desk'] = null;
        $data['pages'] = null;
      }
      
      $this->view->render('pages/one-desk', $data);
    }
    
  }

  public function showCard() {
    $username = $this->route['username'];
    $deskSegment = $this->route['segment'];
    $userFromDB = $this->data['user'];

    $data['username'] = $username;  

    if ($username !== $userFromDB->username) {
      $this->view->render('pages/user-not-exists', $data);
    } else {
      $this->load->model('Desk');
      $this->load->model('Page');

      $data['user'] = $this->data['user'];
      $user_id = $data['user']->id;
      $data['desks'] = $this->model->desk->getDesksByUserId($user_id);
      $data['desk'] = $this->model->desk->getDesk($deskSegment, $user_id);
      $data['segment'] = $deskSegment;

      if ($data['desk']) {
        $desk_id = $data['desk']->id;
        $data['pages'] = $this->model->page->getPagesByDeskId($desk_id);
      } else {
        $data['desk'] = null;
        $data['pages'] = null;
      }
      
      $this->view->render('pages/one-desk', $data);
    }
    
  }

  public function showMyFriends() {
    $username = $this->route['username'];
    $userFromDB = $this->data['user'];

    $data['username'] = $username;  

    if ($username !== $userFromDB->username) {
      $this->view->render('pages/user-not-exists', $data);
    } else {

      $data['user'] = $this->data['user'];
      
      $this->view->render('pages/my-friends', $data);
    }
  }

  public function showGlobalDesks() {
    $username = $this->route['username'];
    $userFromDB = $this->data['user'];

    $data['username'] = $username;  

    if ($username !== $userFromDB->username) {
      $this->view->render('pages/user-not-exists', $data);
    } else {

      $data['user'] = $this->data['user'];
      
      $this->view->render('pages/global-desks', $data);
    }
  }

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