<?php

namespace Site\Controller;

use Core\Controller; 
use Core\DI;
use Core\Worker\Auth\Auth;

class LogoutController extends Controller {

    protected $auth;

    public function __construct(DI $di) {

        parent::__construct($di);

        $this->auth = new Auth($di);
    }

    public function logout() {
        $this->auth->unAuthorize();
        header('Location: /login/');
        exit;
    }
}

?>