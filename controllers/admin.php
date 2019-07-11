<?php

class Admin extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->render('/admin/index');
    }
}