<?php

class Login extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->render('/login/index');
    }

    function ingresar(){
      
      $user_log = $_POST['usuario'];
      $pass_log = $_POST['pass'];

      $this->model->consult(['username' => $user_log, 'pass' => $pass_log]);
      echo  "haz ingresado";
      
    }
}