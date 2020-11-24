<?php

namespace App\Models;
use App\DBOperation\DatabaseOperation;

// require_once 'loader.php';

class Mentee {
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
        $insertQuery = "INSERT INTO mentee(name, email, phone, password, created_at) VALUES('{$this->name}', '{$this->email}', '{$this->phone}', '{$this->password}', '{$date}')";
        $result = $this->dbOperation->query($insertQuery);
        return $result;
    }

    public function getMenteeBy($key, $value) {
        $selectQuery = "SELECT * FROM mentee WHERE $key = '$value'";
        $result = $this->dbOperation->query($selectQuery);
        return $result->result;
    }

    public function getMyMentor($menteeId) {
        $selectQuery = "SELECT * FROM mentor_mentee as mm JOIN mentor as mt ON mt.id = mm.mentor_id WHERE mm.mentee_id = '$menteeId'";
        $result = $this->dbOperation->query($selectQuery);
        return $result->result;
    }

    public function getAllMentee() {
        $selectQuery = "SELECT * FROM mentee";
        $result = $this->dbOperation->query($selectQuery);
        return $result->result;
    }
}