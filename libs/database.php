<?php

class Database{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function _construct()
    {
        $this->$host = constant('HOST');
        $this->$db = constant('DB');
        $this->$user = constant('USER');
        $this->$password = constant('PASSWORD');
        $this->$charset = constant('CHARSET');
    }

    function connect(){
        try{
            $pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->password);
            return $pdo;
        } catch (PDOException $e){
            print_r('Error connection:' . $e->getMessage());
        }
    }
}