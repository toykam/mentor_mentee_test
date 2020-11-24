<?php

namespace App\DBOperation;

 class DatabaseOperation {

    private $host = 'smartpayng.com.ng';
    private $dbname = 'smartpa2_interview';
    private $user = 'smartpa2_interview';
    private $password = 'interview1234567890';
    private $_connection;
    public $result;
    public $error;

    public function __construct() {
        // make connection to the database
        $this->_connection = new \mysqli($this->host, $this->user, $this->password, $this->dbname) or die("Unable to connect: ".mysqli_error($this->_connection));
        return $this;
    }

    public function query($sql) {
        $this->result = $this->_connection->query($sql);
        if (!$this->result)
            $this->error = mysqli_error($this->_connection);
        return $this;
    }
    
 }