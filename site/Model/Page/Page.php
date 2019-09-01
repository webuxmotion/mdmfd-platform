<?php

namespace Site\Model\Page;

use Core\Worker\Db\ActiveRecord;

class Page {

    use ActiveRecord;

    protected $table = 'page';
    public $id;
    public $title;
    public $link;
    public $color;
    public $content;
    public $markdown;
    public $desk_id;
    public $user_id;
    public $segment;
    public $type;
    public $status;
    public $date;

    public function getId() {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDeskId()
    {
        return $this->desk_id;
    }

    public function setDeskId($desk_id)
    {
        $this->desk_id = $desk_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }
    /**
     * @param mixed $id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    public function getLink()
    {
        return $this->link;
    }
    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getColor()
    {
        return $this->color;
    }
    public function setColor($color)
    {
        $this->color = $color;
    }
    
    public function getContent() {
        return $this->content;
    }
    
    public function setContent($content) {
        $this->content = $content;
    }

    public function getMarkdown() {
        return $this->markdown;
    }
    
    public function setMarkdown($markdown) {
        $this->markdown = $markdown;
    }
    
    public function getDate()
    {
        return $this->date;
    }
    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
    /**
     * @return mixed
     */
    public function getSegment()
    {
        return $this->segment;
    }
    /**
     * @param mixed $segment
     */
    public function setSegment($segment)
    {
        $this->segment = $segment;
    }
    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
