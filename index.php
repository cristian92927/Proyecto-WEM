<?php
    require_once('app/controllers/controller.php');

    $controller= new controller();
    
    if(!empty($_REQUEST['v'])){
        $metodo=$_REQUEST['v'];
        if (method_exists($controller, $metodo)) {
            $controller->$metodo();
        }else{
            $controller->index();
        }
    }else{
        $controller->index();
    }
?>