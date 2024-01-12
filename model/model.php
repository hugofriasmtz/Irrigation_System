<?php

class Model extends DataBase {

    // Consultas PHPMySQL
    public function consultUser($username) {
        return $this->ConsultaPreparada("SELECT * FROM users WHERE email=? AND status = ?", [$username,'ACTIVE']);
    }

    public function insertUser($datos){
        $estado = $this->InsertarRegistrosPreparada("INSERT INTO users (role_id, email, password, first_names, last_names, status) VALUES (?,?,?,?,?,?)",$datos);
        return $estado;
    }

    //Consulta que muesra todos los datos del usuario por el id
    public function findUserByid($id){
        $dato = $this->ConsultaPreparada("SELECT * FROM users WHERE id = ?", [ $id ] ); 
        return $dato;
    }

    /**DASHBOARS HOME**/
        /*CARDS COUNT*/
            public function CardsAdmin(){
                $users      = $this->ConsultaNormal("SELECT count(*) AS TOTAL FROM users WHERE role_id = 2");
                $usersA     = $this->ConsultaNormal("SELECT count(*) AS TOTAL FROM users WHERE role_id = 1");
                $products   = $this->ConsultaNormal("SELECT count(*) AS TOTAL FROM lands");
                $brands     = $this->ConsultaNormal("SELECT count(*) AS TOTAL FROM towers");

                return [
                    "users_admin"   => $usersA      [0]["TOTAL"],
                    "users"         => $users       [0]["TOTAL"],
                    "lands"         => $products    [0]["TOTAL"],
                    "towers"        => $brands      [0]["TOTAL"],
                ];
            
            }
            public function CardsUser( $userID ){
                $lands   = $this->ConsultaNormal("SELECT count(*) AS TOTAL FROM lands WHERE user_id = ?" [$userID]);
            
                return [
                    "lands"  => $lands    [0]["TOTAL"],

                ];
            
            }
        /*END CARDS COUNT*/
            
        /*TABLE USER*/
            public function usersFarmersDashboard(){
                $role = $this->ConsultaNormal("SELECT CONCAT_WS(' ', users.first_names, users.last_names) AS full_name, roles.names AS role_name
                 FROM users 
                 INNER JOIN roles ON users.role_id = roles.id
                 WHERE roles.names = 'farmer'");
                return $role;
            }
            public function usersAdminDashboard(){
                $role = $this->ConsultaNormal("SELECT CONCAT_WS(' ', users.first_names, users.last_names) AS full_name, roles.names AS role_name
                 FROM users 
                 INNER JOIN roles ON users.role_id = roles.id
                 WHERE roles.names = 'admin'");
                return $role;
            }
        /*END TABLEUSER */
    
    public function landForTowers($towerID){
        $data = $this->ConsultaPreparada("SELECT COUNT(*) AS total FROM lands WHERE tower_id = ?  AND deleted IS NULL", [$towerID]);
        
        return $data [0];
    }

    /**  END OF THE DASHBOARD HOME**/

    /*DATE CALENDAR USER */
        public function DateCalendarUser(){
            $data = $this->ConsultaNormal("SELECT  irrigation_lands_time.id, irrigation_lands_time.title ,irrigation_lands_time.description as 'descripcion' ,irrigation_lands_time.hour_start as 'start', 
            irrigation_lands_time.hour_end as 'end', irrigation_lands_time.color
            FROM `irrigation_lands_time` ");
            return $data;
        }
    /*END OF THE DATE CALENDAR USER */
    

    //Datos de Usuarios, Pozos y  DATA

    public function dataUsers(){
        $data = $this->ConsultaPreparada("SELECT users.id, users.first_names, users.last_names, CONCAT_WS( ' ', users.first_names, users.last_names ) AS full_name, users.email, users.cellphone, users.status, users.created, users.role_id FROM users WHERE users.role_id = ?;", [2]);
        return $data;
    }

    public function datalands(){
        $data = $this->ConsultaNormal("SELECT CONCAT_WS( ' ', users.first_names, users.last_names ) AS full_name,towers.name, towers.status AS status_tower,
        lands.length,lands.wide,towers.name, lands.id, lands.tower_id, lands.address, lands.status, lands.created 
        FROM lands 
        INNER JOIN users ON lands.user_id = users.id
        INNER JOIN towers on lands.tower_id = towers.id 
        WHERE lands.deleted IS NULL");
        return $data;
    }
    public function getUserLands($user_id){
        $data = $this->ConsultaPreparada("SELECT *
        FROM lands
        WHERE lands.deleted IS NULL AND lands.user_id = ?", [$user_id]);
        return $data;
    }
   
    public function datatowers(){
        $data = $this->ConsultaNormal("SELECT towers.id,towers.name, towers.address AS ubication , towers.capacity, towers.hours, towers.status
        FROM towers WHERE towers.deleted IS NULL");
        return $data;
    }

    //  END ON DATA

    public function FindUserByEmail($username){
        $dato = $this->ConsultaPreparada("SELECT * FROM users WHERE email = ?", [ $username ] ); 
        return $dato;
    }

    public function inserFulltUser($datos){
        $estado = $this->InsertarRegistrosPreparada("INSERT INTO users (role_id, email, password, first_names, last_names,gener,birthday,cellphone,status) VALUES (?,?,?,?,?,?,?,?,?)",$datos);
        return $estado;
    }

    public function inserTowers($datos){
        $estado = $this->InsertarRegistrosPreparada("INSERT INTO towers (name, capacity, hours, address, status ) VALUES (?,?,?,?,?)",$datos);
        return $estado;
    }

    public function inserLands($datos){
        $estado = $this->InsertarRegistrosPreparada("INSERT INTO lands (user_id, tower_id, length, wide, address, status ) VALUES (?,?,?,?,?,?)",$datos);
        return $estado;
    }
    
    public function inserUserLands($datos){
        $estado = $this->InsertarRegistrosPreparada("INSERT INTO lands (user_id, length, wide, address, status ) VALUES (?,?,?,?,?)",$datos);
        return $estado;
        
    }

    public function inserDateCalendar($datos){
        $estado = $this->InsertarRegistrosPreparada("INSERT INTO irrigation_lands_time (irrigation_id, day, hour_start, hour_end, title, description, color, status ) VALUES (?,?,?,?,?,?,?,?)",$datos);
        return $estado;
    }

    public function GetProfileWorker($UserID){
        $request = $this->ConsultaPreparada("SELECT users.id, users.email, users.first_names, users.first_names, users.last_names, users.gener, users.birthday, users.cellphone, users.created, users.modified
        from users
        WHERE users.id = ?", [ $UserID ]);
        return $request;
    }

    public function GetProfileAdmin($UserID){
        $request = $this->ConsultaPreparada("SELECT *  FROM users WHERE users.id = ?", [ $UserID ]);
        return $request;
    }

    public function RolProfileWorker($UserID){
        $data = $this->ConsultaPreparada("SELECT CONCAT_WS( ' ',users.first_names, users.last_names) AS full_name, roles.description as description, roles.names as name, users.id
        FROM `users`
        INNER JOIN roles ON users.role_id = roles.id
        WHERE users.id= ?", [ $UserID ]);
        return $data;
    }


    public function UserById($id) {
        $camdts = $this->ConsultaPreparada("SELECT * FROM users WHERE id = ?", [$id]);
        return $camdts;
    }

    public function DeletedUser($datos){
        $resultado = $this->ModificarRegistrosPreparada("UPDATE users SET deleted = ?, status = ? WHERE id = ?", $datos );
        return $resultado;
    }

    public function UpdateUser($datos){
        $resultado = $this->ModificarRegistrosPreparada("UPDATE users SET first_names = ?, last_names =?, gener = ? , birthday = ?, cellphone = ? ,email = ?, modified = ? WHERE id = ?", $datos );
        return $resultado;
    }

    public function UpdateProfile($datos){
        $resultado = $this->ModificarRegistrosPreparada("UPDATE users SET first_names = ?, last_names =?, gener = ? , birthday = ?, cellphone = ? ,email = ? WHERE id = ?", $datos );
        return $resultado;
    }


    public function TowerByID($id){
        $dato = $this->ConsultaPreparada("SELECT * FROM towers WHERE id = ?", [ $id ] ); 
        return $dato;
    }


    public function UpdateTower($datos){
        $resultado = $this->ModificarRegistrosPreparada("UPDATE towers SET name = ?, address =?, capacity = ? , hours = ? WHERE id = ?", $datos );
        return $resultado;
    }

    public function DeletedTower($datos){
        $resultado = $this->ModificarRegistrosPreparada("UPDATE towers SET deleted = ? WHERE id = ?", $datos );
        return $resultado;
    }


    public function LandById($id) {
        $data = $this->ConsultaPreparada("SELECT * FROM lands WHERE id = ?", [ $id ] ); 
        return $data;
    }
    public function UpdateLand($datos){
        $resultado = $this->ModificarRegistrosPreparada("UPDATE lands SET user_id = ?, tower_id = ?, length = ?, wide = ?, address =? WHERE id = ?", $datos );
        return $resultado;
    }
    public function UpdateUserLand($datos){
        $resultado = $this->ModificarRegistrosPreparada("UPDATE lands SET  length = ?, wide = ?, address =? WHERE id = ?", $datos );
        return $resultado;
    }

    public function DeletedLand($datos){
        $resultado = $this->ModificarRegistrosPreparada("UPDATE lands SET deleted = ? WHERE id = ?", $datos );
        return $resultado;
    }

    //Actualizar datos de usuario
    public function ActualizarDatosUser($datos){
        $resultado = $this->ModificarRegistrosPreparada("UPDATE users SET first_names =?, last_names=?, gener=? , birthday=?, cellphone=? WHERE id = ?", $datos );
        return $resultado;
    }

    public function actulizarContraseña($datos){
        $resultado = $this->ModificarRegistrosPreparada("UPDATE users SET password=? WHERE id = ?", $datos );
        return $resultado;
    }
    

    public function findUsersByStatus($status){
        return $this->ConsultaPreparada('SELECT id,  CONCAT_WS ( " " , first_names , last_names ) AS full_name 
        FROM users 
        WHERE role_id = 2 AND status = ?', [ $status ] );
    }

    public function findTowersByStatus($status){
        return $this->ConsultaPreparada('SELECT id , towers.name AS name, towers.address 
        FROM towers
        WHERE towers.status = ? AND towers.deleted IS NULL', [ $status ] );
    }

}

?>