<?php

namespace Site\Controller;

use Site\Classes\Page;

class_alias('Site\\Classes\\Page', 'Page');

class PageController extends SiteController {

    public function create() {

      $params = $this->request->post;

      $this->load->model('Page');

      $pageId = $this->model->page->create($params);

      if (isset($params['redirect'])) {
          header('Location: ' . $params['redirect']);
          exit;
      }
      echo $pageId;

    }

  public function update() {

    $params = $this->request->post;

    $this->load->model('Page');

    $pageId = $this->model->page->updatePage($params);
    echo $pageId;
  }

  public function delete() {

    $params = $this->request->post;

    $this->load->model('Page');

    $pageId = $this->model->page->delete($params);
    echo $pageId;
  }
}
