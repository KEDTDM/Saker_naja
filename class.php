<?php

class CnnSCV extends mysqli {
	
	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $db = 'saker_db';
	
    public function __construct() {
        
		parent::__construct($this->host, $this->user, $this->pass, $this->db);

        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
    }
}




?>