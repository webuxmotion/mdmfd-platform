<?php

namespace Site\Model\User;

use \Core\Model;
use Core\Helper\Cookie;

class UserRepository extends Model {

  public function getUserByHash() {

    $user_hash = Cookie::get('user_hash');

    $sql = $this->queryBuilder
      ->select()
      ->from('user')
      ->where('hash', $user_hash)
      ->limit(1)
      ->sql();

    return $this->db->query($sql, $this->queryBuilder->values)[0];
  }

  public function getUsers() {

    $sql = $this->queryBuilder
      ->select()
      ->from('user')
      ->orderBy('id', 'DESC')
      ->sql();

    return $this->db->query($sql);
  }

  public function updateEmail($params) {
    $user = new User($params['id']);
    $user->setEmail($params['email']);
    $user->save();
  }

  public function newUser($params) {
    $user = new User;
    $user->setEmail($params['email']);
    $user->setPassword(md5($params['password']));
    $user->setRole('user');
    $user->setHash('new');
    $id = $user->save();
    
    return $id;
  }
}

?>
