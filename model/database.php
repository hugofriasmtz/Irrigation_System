<?php
    class Database {
        var $string = "mysql:host=localhost;dbname=irrigation_system";
        var $user = "root";
        var $password = "";
        var $conn;
        var $depuracion = true;

        function open() {
            try {
            $this->conn = new PDO($this->string, $this->user, $this->password);
            $this->conn->exec("set character set utf8");
            } catch (PDOException $e) {
                if ($this->depuracion)
                    echo $e->getMessage();
                    $this->conn = NULL; die();
            }
        }
    
        function CerrarConexion() { $this->conn = NULL; }
    
        function ConsultaPreparada($sql, $parametros) {
            if ($this->conn == NULL)
                $this->open();
            $sentencia = $this->conn->prepare($sql);
            if ($sentencia->execute($parametros)) {
                return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            } else {
                if ($this->depuracion)
                    echo var_dump($sentencia->errorInfo());
                return null;
            }
        }
    
        public function ConsultaNormal($sql) {
                if ($this->conn == NULL)
                    $this->open();
                $sentencia = $this->conn->prepare($sql);
                if ($sentencia->execute()) {
                    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    if ($this->depuracion){
                        
                        return FALSE;
                    } 
                }
        }
    
        public function normalInsertion($sql) {
            if ($this->conn == NULL)
              $this->open();
            $sentencia = $this->conn->prepare($sql);
            if ($sentencia->execute()) {
              return TRUE;
            }else{
              if ($this->depuracion){
                  print_r($sentencia->errorInfo()); exit;
                  return FALSE;
              }
            }
        }
    
        public function InsertarRegistrosPreparada($sql, $parametros) {
          if ($this->conn == NULL)
            $this->open();
          $sentencia = $this->conn->prepare($sql);
          if ($sentencia->execute($parametros)) {
            return TRUE;
          }else{
            if ($this->depuracion){
                echo var_dump($sentencia->errorInfo()); exit;
                return FALSE;
            }
          }
        }
    
        public function ModificarRegistrosPreparada($sql, $parametros) {
    
            if ($this->conn == NULL)
                $this->open();
    
            $sentencia = $this->conn->prepare($sql);
            if ($sentencia->execute($parametros)) {
                return TRUE;
            } else {
                if ($this->depuracion){
                    echo var_dump($sentencia->errorInfo()); exit;
                    return FALSE;
                }
            }
    
        }
    
        public function EliminarRegistrosPreparada($sql, $parametros) {
    
            if ($this->conn == NULL)
                $this->open();
            $sentencia = $this->conn->prepare($sql);
            if ($sentencia->execute($parametros)) {
                return TRUE;
            } else {
                if ($this->depuracion){
                    return FALSE;
                }
            }
    
        }
    
        function ConsultaAsociativaOrdenada($tabla, $filtro, $orden, $parametros) {
            if ($this->conn == NULL)
                $this->open();
            $sentencia = $this->conn->prepare("SELECT * FROM " . $tabla . " where " . $filtro . "ORDER BY " . $orden);
            if ($sentencia->execute($parametros)) {
                return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            } else {
                if ($this->depuracion)
                    echo var_dump($sentencia->errorInfo());
                return null;
            }
        }

    }


?>  