<?php
    class TipoDoc extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }

        function render(){
            $tipodocs = $this->view->datos = $this->model->read();
            $this->view->tipodocs = $tipodocs;
            $this->view->render('tipodoc/index');
        }
        function crear(){
            if(isset($_POST["id"])){
                if($this->model->create($_POST)){
                    $this->view->mensaje = "Tipo documento creado correctamente";
                    $tipodocs = $this->view->datos = $this->model->read();
                    $this->view->tipodocs = $tipodocs;
                    $this->view->render('tipodoc/index');
                }else{
                    
                    $this->view->mensaje = "El tipo de documento ya existe";
                    $this->view->render('tipodoc/form');
                }
            }else{
                $this->view->render('tipodoc/form');
            }
        }
        function leer($param = null){
            $id = $param[0];
            $tipdoc = $this->model->readById($id);
    
            session_start();
            $_SESSION["id_tipodoc"] = $tipodoc->id;
    
            $this->view->tipodoc = $tipodoc;
            $this->view->render('tipodoc/form');
        }
        function editar($param = null){
            session_start();
            $id = $_SESSION["id_verPrograma"];
            unset($_SESSION['id_verPrograma']);
    
            if($this->model->update($_POST)){
                $programa = new ProgramaDAO();
                $programa->nroprograma = $id;
                $programa->nroprograma = $_POST['nroprograma'];
                $programa->nombre = $_POST['nombre'];
                $programa->descripcion = $_POST['descripcion'];
                $programa->totalhoras = $_POST['totalhoras'];
    
    
                $this->view->programa = $programa;
                $this->view->mensaje = "Programa actualizado correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar al programa";
            }
            $programas = $this->view->datos = $this->model->read();
            $this->view->programas = $programas;
            $this->view->render('programa/index');
        }
        function eliminar($param = null){
            $id = $param[0];
    
            if($this->model->delete($id)){
                $mensaje ="Programa eliminado correctamente";
                //$this->view->mensaje = "Alumno eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar el programa";
                //$this->view->mensaje = "No se pudo eliminar al alumno";
            }
    
            //$this->render();
    
            echo $mensaje;
        }
    }
?>