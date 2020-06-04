<?php

require_once "login_controller.php";
require_once "instructor_controller.php";

class controller{

    public function Login($option,$array=[]){
        return login_controller::Main($option,$array);
    }
    public function instructor($option,$array=[]){
        return instructor_controller::Main($option,$array);
    }
}
?>