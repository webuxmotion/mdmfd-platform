<?php

namespace Site\Model\Desk;

use Core\Model;

class DeskRepository extends Model {

    public function getDesksByUserId($user_id) {
        $sql = $this->queryBuilder->select()
            ->from('desk')
            ->where('user_id', $user_id)
            ->orderBy('id', 'DESC')
            ->sql();
        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function getDesk($segment, $user_id) {
        $sql = $this->queryBuilder->select()
            ->from('desk')
            ->where('segment', $segment)
            ->where('user_id', $user_id)
            ->limit(1)
            ->sql();
        $result = $this->db->query($sql, $this->queryBuilder->values);
        return isset($result[0]) ? $result[0] : false;
    }

    public function getDeskById($id) {
        $sql = $this->queryBuilder->select()
            ->from('desk')
            ->where('id', $id)
            ->limit(1)
            ->sql();
        $result = $this->db->query($sql, $this->queryBuilder->values);
        return isset($result[0]) ? $result[0] : false;
    }

    private function generateUniqueSegment($user_id, $segment) {
        $desks = $this->getDesksByUserId($user_id);
        $segments = [];
        $candidate_segment = \Core\Helper\Text::transliteration($segment);
        foreach ($desks as $key => $value) {
            $segments[$value->segment] = $key;
        }
        if (array_key_exists($candidate_segment, $segments)) {
            $counter = 1;
            while (true) {
                $segment = $candidate_segment;
                if (!array_key_exists($segment . '-' . $counter, $segments)) {
                    $candidate_segment = $segment . '-' . $counter;
                    return $candidate_segment;
                } 
                $counter++;
            }
        } else {
          return $candidate_segment;
        }

    }

    public function add($params) {
        $segment = $this->generateUniqueSegment($params['user_id'], $params['name']);
        
        $desk = new Desk;
        $desk->setName($params['name']);
        $desk->setUserId($params['user_id']);
        $desk->setSegment($segment);
        $deskId = $desk->save();
        return $deskId;
    }

    public function update($params) {

        $deskSegment = $this->getDeskById($params['id'])->segment; 

        $desk = new Desk($params['id']);

        $segment = $deskSegment == $params['segment'] ? $params['segment'] :
          $this->generateUniqueSegment($params['user_id'], $params['segment']);

        $desk->setName($params['name']);
        $desk->setSegment($segment);
        $desk->save();

        $res = [
          "segment" => $segment 
        ];
        echo json_encode($res);
    }
}
