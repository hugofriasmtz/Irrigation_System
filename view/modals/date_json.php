<?php
    header('Content-Type: application/json');
    include_once "../../model/database.php";
    include_once "../../model/model.php";
    include_once "../../controller/structure.php";
    include_once "../../controller/controller.php";
    
    $controller = new Controlador();
    echo $controller->DataUserCalendar();

?>