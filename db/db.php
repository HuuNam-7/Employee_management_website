<?php
    define('HOST', 'localhost');
    define('USER', 'root'); 
    define('PASS', '');
    define('DB_NAME', 'managesystem');

    function create_connection(){
        $connectedDatabase = new mysqli(HOST, USER, PASS, DB_NAME);
        if($connectedDatabase->connect_error){
            die('Can not connect to the server'. $connectedDatabase->connect_error);
        }
        return $connectedDatabase;
    }
 ?>