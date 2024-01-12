<?php
include_once "../../model/database.php";
include_once "../../model/model.php";
include_once "../../controller/structure.php";
include_once "../../controller/controller.php";
$controller = new Controlador();

if (isset($_POST['land_id'])) {
    $land = $controller->GetLand($_POST['land_id']);
    if (!is_null($land)) {

        $payload = '
                <form class="d-flex p-1" method="POST">
                    <div>
                        <h4>Esta accion es irremisible, se eliminara el terreno de su cuenta</h4>
                        <input type="hidden" name="d_user_land_id" value="' . $land['id'] . '">
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </div>
                    </div>
                    
                </form>
                
                
            ';

        echo $payload;
    } else {
        echo "No se puede eliminar El terreno, comunicarse con el administrador";
    }
}
