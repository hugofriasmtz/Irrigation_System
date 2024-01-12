<?php
    include_once "../../model/database.php";
    include_once "../../model/model.php";
    include_once "../../controller/structure.php";
    include_once "../../controller/controller.php";
    $controller = new Controlador();

    if ( isset($_POST['tower_id'])  ) {
       
        $tower = $controller->GetTower($_POST['tower_id']);
        if ( !is_null( $tower ) ) {
            
            $payload = '
            <form class="d-flex p-1" method="POST">
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="tower_id" value="'.$tower['id'].'">
                        <input type="hidden" name="deleted_tower" value="'.$tower['id'].'">
                        <div class="container">
                            <h4 class="display-4">El Pozo '.$tower['name'].'</h4>
                            <h5 class="text-danger">sera eliminado.</5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
            ';

            echo $payload;

        }else {
            echo "No se puede eliminar este Pozo de Agua, comunicarse con el administrador";
        }
        
    }

?>