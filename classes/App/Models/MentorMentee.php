<?php

namespace App\Models;
use App\DBOperation\DatabaseOperation;

// require_once 'loader.php';


class MentorMentee {
    public $mentorId;
    public $menteeId;
    private $dbOperation;

    public function __construct() {
        $this->dbOperation = new DatabaseOperation();
        return $this;
    }

    public function create($mentorId, $menteeId) {
        $this->mentorId = $mentorId;
        $this->menteeId = $menteeId;
        return $this;
    }

    public function storeToDb() {
        $date = date('Y-m-d H:i:s');
        $insertQuery = "INSERT INTO mentor_mentee(mentor_id, mentee_id, created_at) VALUES('{$this->mentorId}', '{$this->menteeId}', '{$date}')";
        $result = $this->dbOperation->query($insertQuery);
        return $result;
    }

    public function checkMentorMentee($mentorId, $menteeId) {
        $insertQuery = "SELECT * FROM mentor_mentee WHERE mentor_id = '{$mentorId}' AND mentee_id = '{$menteeId}'";
        $result = $this->dbOperation->query($insertQuery);
        return $result;
    }
}