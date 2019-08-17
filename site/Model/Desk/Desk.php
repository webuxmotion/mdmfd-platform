<?php

namespace Site\Model\Desk;

use Core\Worker\Db\ActiveRecord;

class Desk {

    use ActiveRecord;

    protected $table = 'desk';
    public $id;
    public $user_id;
    public $name;
    public $segment;
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }

    public function getSegment() {
        return $this->segment;
    }
    
    public function setSegment($segment) {
        $this->segment = $segment;
    }
}