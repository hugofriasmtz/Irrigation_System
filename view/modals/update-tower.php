<?php
    include_once "../../model/database.php";
    include_once "../../model/model.php";
    include_once "../../controller/structure.php";
    include_once "../../controller/controller.php";
    $controller = new Controlador();

    if ( isset($_POST['tower_id'])  ) {

        $tower = $controller->GetTower($_POST['tower_id']);

        if ( !is_null($tower) ) {
            
            $payload = '
            <form class="d-flex p-1" method="POST">
                <div>
                    <div class="row">
                      <input type="hidden" name="update_tower" value="'.$tower['id'].'">
                      <input type="hidden" name="tower_id" value="'.$tower['id'].'">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Nombre</label>
                          <input class="form-control" type="text" placeholder="Nombre" name="name" value="'.$tower['name'].'">
                        </div>
                      </div>
                      <div class="col-md-12">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Ubicación</label>
                        <textarea  class="form-control" type="text" placeholder="Descripcion" name="address" >'.$tower['address'].'</textarea>
                      </div>
                    </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Capacidad</label>
                          <input class="form-control" type="text" placeholder="Miguel Hidalgo" name="capacity" value="'.$tower['capacity'].'">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Horas</label>
                          <input class="form-control" type="text" placeholder="1509" name="hours" value="'.$tower['hours'].'">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </div>
            </form>
            ';

            echo $payload;

        }else {
            # code...
        }
        
    }

?>