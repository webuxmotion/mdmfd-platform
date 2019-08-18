<?php

namespace Site\Controller;

use Admin\Model\Page\PageRepository;
use Site\Classes\Page;

class_alias('Site\\Classes\\Page', 'Page');

class PageController extends SiteController {

    const TEMPLATE_PAGE_MASK = 'page-%s';
    
    public function show($segment) {
        $this->load->model('Page', false, 'Admin');
        $pageModel = $this->model->page;
        $page = $pageModel->getPageBySegment($segment, 'publish');
        if ($page === false) {
            header('Location: /');
            exit;
        }
        $template = 'page';
        if ($page->type !== 'page') {
            $template = sprintf(self::TEMPLATE_PAGE_MASK, $page->type);
        }
        Page::setStore($page);
        $this->view->render($template);
    }

    public function create() {

      $params = $this->request->post;

      $this->load->model('Page', false, 'Admin');

      $pageId = $this->model->page->create($params);

      if (isset($params['redirect'])) {
          header('Location: ' . $params['redirect']);
          exit;
      }
      echo $pageId;

    }

  public function update() {

    $params = $this->request->post;

    $this->load->model('Page', false, 'Admin');

    $pageId = $this->model->page->updatePage($params);
    echo $pageId;
  }
}
