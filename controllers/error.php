<?php

class Fail extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->render('/error/index');
        //echo "<p>Error al cargar recurso</p>";
    }
}