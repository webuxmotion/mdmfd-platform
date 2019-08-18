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
}
