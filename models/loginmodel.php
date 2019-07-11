<?php

class LoginModel extends Model{

    public function __construct()
    {
       parent::__construct();
    }

    public function consult($datos){
        //Insertar datos en BD
        $query = $this->db->connnect()->prepare('SELECT * FROM users WHERE name_user = :nameUser AND pass_user = :passUser');
        $query->execute(['nameUser' => $datos['username'], 'passUser' => $datos['pass']]);
        echo "Insertar datos";
    }
}