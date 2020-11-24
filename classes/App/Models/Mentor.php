<?php

namespace App\Models;
use App\DBOperation\DatabaseOperation;

// require_once 'loader.php';


class Mentor {
    public $name;
    public $email;
    public $phone;
    public $password;
    private $dbOperation;

    public function __construct() {
        $this->dbOperation = new DatabaseOperation();
        return $this;
    }

    public function create($name, $email, $phone, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        return $this;
    }

    public function storeToDb() {
        $date = date('Y-m-d H:i:s');
        $insertQuery = "INSERT INTO mentor(name, email, phone, password, created_at) VALUES('{$this->name}', '{$this->email}', '{$this->phone}', '{$this->password}', '{$date}')";
        $result = $this->dbOperation->query($insertQuery);
        return $result;
    }

    public function getMentorBy($key, $value) {
        $selectQuery = "SELECT * FROM mentor WHERE $key = '$value'";
        $result = $this->dbOperation->query($selectQuery);
        return $result->result;
    }

    public function getMentorMentee($mentorId) {
        $selectQuery = "SELECT * FROM mentor_mentee as mm JOIN mentee as mtee ON mtee.id = mm.mentee_id WHERE mm.mentor_id = '$mentorId'";
        // echo $selectQuery;
        $result = $this->dbOperation->query($selectQuery);
        return $result->result;
    }
}