<?php

namespace Site\Controller;

use Core\Controller; 
use \Core\DI;
use \Core\Worker\Auth\Auth;

class LoginController extends Controller {

  protected $auth;

  public function __construct($route, DI $di) {

    parent::__construct($route, $di);

    $this->auth = new Auth($di);

    if ($this->auth->isRole('user')) {
      header('Location: /');
      exit;
    }
  }

  public function login() {
    $this->view->render('login');
  }

  public function register() {
    $this->view->render('register');
  }

  public function registerUser() {

    $params = $this->request->post;

    $sql = $this->queryBuilder
      ->select()
      ->from('user')
      ->where('email', $params['email'])
      ->where('password', md5($params['password']))
      ->limit(1)
      ->sql();

    $query = $this->db->query($sql, $this->queryBuilder->values);

    if (!empty($query)) {
      $data['emailErrorMessage'] = "This email already using!";
      $this->view->render('register', $data);
    } else {
      $this->load->model('User');
      if ($this->model->user->newUser($params)) {
        $_SESSION['registeredStatus'] = true;
        header('Location: /login/');
        exit;
      }
    }
    
  }

  public function authenticate() {

    $params = $this->request->post;

    $sql = $this->queryBuilder
      ->select()
      ->from('user')
      ->where('email', $params['email'])
      ->where('password', md5($params['password']))
      ->limit(1)
      ->sql();

    $query = $this->db->query($sql, $this->queryBuilder->values);

    if (!empty($query)) {

      $user = $query[0];

      if ($user->role == 'user') {

        $hash = md5($user->id . $user->email . $user->password . $this->auth->salt());

        $sql = $this->queryBuilder
          ->update('user')
          ->set(['hash' => $hash])
          ->where('id', $user->id)
          ->sql();

        $this->db->execute($sql, $this->queryBuilder->values);

        $this->auth->authorize($hash);
      }

    }

    header('Location: /');
    exit;
  }

}

?>
