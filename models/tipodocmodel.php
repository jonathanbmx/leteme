<?php
include_once('models/tipodoc.php');

class TipoDocModel extends Model{
    function __construct(){
        parent::__construct();
    }

    public function create($datos = null){
        // insertar
        //if(!isset($datos)){
            $sentenceSQL="INSERT INTO tipo_documento( id, descripcion) VALUES( :id, :descripcion)";
            $connexionDB=$this->db->connect();
            $query = $connexionDB->prepare($sentenceSQL);
            
            try{
                $query->execute([
                                'id' => $datos['id'],
                                'descripcion' => $datos['descripcion']
                ]);
                return true;
            }catch(PDOException $e){
            if(constant("DEBUG")){
                    echo $e->getMessage();
            }
                
                return false;
            }
        // }else{
        //     return false;
        // }
        
        
    }
    public function read(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT * FROM tipo_documento');
            
            while($row = $query->fetch()){
                $item = new TipoDocDAO();
                $item->id = $row['id'];
                $item->descripcion  = $row['descripcion'];
              
                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
           if(constant("DEBUG")){
               echo $e->getMessage();
           }
            return [];
        }
    }

    public function readById($id){
        $item = new ProgramaDAO();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM programa WHERE nroprograma = :id');

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
                $item->nroprograma = $row['nroprograma'];
                $item->nombre    = $row['nombre'];
                $item->descripcion  = $row['descripcion'];
                $item->totalhoras  = $row['totalhoras'];
                $item->creacion  = $row['creacion'];
            }
            return $item;
        }catch(PDOException $e){
            if(constant("DEBUG")){
                echo $e->getMessage();
            }
            return null;
        }
    }

    public function update($item){
        $query = $this->db->connect()->prepare('UPDATE programa SET nombre = :nombre, descripcion = :descripcion, totalhoras = :totalhoras WHERE nroprograma = :nroprograma');
        try{
            $query->execute([
                'nroprograma' => $item['nroprograma'],
                'nombre' => $item['nombre'],
                'descripcion' => $item['descripcion'],
                'totalhoras' => $item['totalhoras']
            ]);
            return true;
        }catch(PDOException $e){
            if(constant("DEBUG")){
                echo $e->getMessage();
            }
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare('DELETE FROM programa WHERE nroprograma = :id');
        try{
            $query->execute([
                'id' => $id
            ]);
            return true;
        }catch(PDOException $e){
            if(constant("DEBUG")){
                echo $e->getMessage();
            }
            return false;
        }
    }



}


?>