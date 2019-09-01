<?php

namespace Site\Model\Page;

use Core\Model;

class PageRepository extends Model {

    public function getPages() {
        $sql = $this->queryBuilder->select()
            ->from('page')
            ->orderBy('id', 'DESC')
            ->sql();
        return $this->db->query($sql);
    }

    public function getPageData($id) {
        $page = new Page($id);
        return $page->findOne();
    }
    
    public function getPageBySegmentAndUserId($segment, $user_id) {
        $sql = $this
            ->queryBuilder
            ->select()
            ->from('page')
            ->where('segment', $segment)
            ->where('user_id', $user_id)
            ->sql()
        ;
        $result = $this->db->query($sql, $this->queryBuilder->values);
        return isset($result[0]) ? $result[0] : false;
    }

    public function getPagesByDeskId($desk_id) {
        $sql = $this
            ->queryBuilder
            ->select()
            ->from('page')
            ->where('desk_id', $desk_id)
            ->orderBy('id', 'DESC')
            ->sql()
        ;
        $result = $this->db->query($sql, $this->queryBuilder->values);
        return isset($result) ? $result : false;
    }

    public function getPageBySegment($segment, $status = null) {
      if ($status === null) {
        $sql = $this
            ->queryBuilder
            ->select()
            ->from('page')
            ->where('segment', $segment)
            ->limit(1)
            ->sql()
        ;
      } else {
        $sql = $this
            ->queryBuilder
            ->select()
            ->from('page')
            ->where('segment', $segment)
            ->where('status', $status)
            ->limit(1)
            ->sql()
        ;
      }
        $result = $this->db->query($sql, $this->queryBuilder->values);
        return isset($result[0]) ? $result[0] : false;
    }

    public function create($params) {
        $page = new Page;
        $page->setTitle($params['title']);
        $page->setUserId($params['user_id']);
        $page->setLink($params['link']);
        $page->setDeskId($params['desk_id']);
        $page->setContent('content');
        $page->setMarkdown('markdown');
        $page->setStatus('publish');
        $page->setColor($params['color']);
        $page->setSegment(\Core\Helper\Text::transliteration($params['title']));
        $page->setType(isset($params['type']) ? $params['type'] : 'page');

        $pageId = $page->save();
        return $pageId;
    }


    public function add($params) {
        $desks = $this->getDesksByUserId($params['user_id']);
        $segments = [];
        $candidate_segment = \Core\Helper\Text::transliteration($params['name']);
        foreach ($desks as $key => $value) {
            $segments[$value->segment] = $key;
        }
        if (array_key_exists($candidate_segment, $segments)) {
            $counter = 1;
            while (true) {
                $segment = $candidate_segment;
                if (array_key_exists($segment . '-' . $counter, $segments)) {
                    
                } else {
                    $candidate_segment = $segment . '-' . $counter;
                    break;
                }
                $counter++;
            }
        }
        
        $desk = new Desk;
        $desk->setName($params['name']);
        $desk->setUserId($params['user_id']);
        $desk->setSegment($candidate_segment);
        $deskId = $desk->save();
        return $deskId;
    }

    public function updateSegment($params) {
        if (isset($params['page_id'])) {
            $page = new Page($params['page_id']);
            $page->setSegment($params['segment']);
            $page->save();
        }
    }

    public function updatePage($params) {
        if (isset($params['page_id'])) {
            $page = new Page($params['page_id']);
            $page->setTitle($params['title']);
            $page->setLink($params['link']);
            $page->setColor($params['color']);
            $page->setContent($params['content']);
            $page->setMarkdown($params['markdown']);
            $page->setStatus($params['status']);
            $page->setType($params['type']);
            $page->save();
        }
    }

    public function delete($params)
    {
        $sql = $this->queryBuilder
            ->delete()
            ->from('page')
            ->where('id', $params['id'])
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);
    }
}
