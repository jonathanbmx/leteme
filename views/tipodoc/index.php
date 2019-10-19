<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tipo documento</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Listado de tipos de documentos</h1>

        <table id="tabla" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th  scope="col">Id</th>
                    <th  scope="col">Descripcion</th>
                    <th  scope="col" colspan="2">Acciones</th>
                    
                </tr>
            </thead>

            <tbody id="tbody-tipodocs">
            
        <?php
            include_once 'models/tipodoc.php';
            if(count($this->tipodocs)>0){
                foreach ($this->tipodocs as $row) {
                    $tipodoc = new TipoDocDAO();
                    $tipodoc = $row;
        ?>
                    <tr id="fila-<?php echo $tipodoc->id; ?>">
                        <td><?php echo $tipodoc->id; ?>
                        <td><?php echo $tipodoc->descripcion; ?>
                        <td><a href="<?php echo constant('URL') . 'tipodoc/leer/' . $tipodoc->id; ?>">Actualizar</a></td>
                        <td><button class="bEliminar" data-controlador="tipodoc" data-accion="eliminar" data-id="<?php echo $tipodoc->id; ?>">Eliminar</button></td> 
                    </tr>
        <?php   
                } 
            }else{
        ?>
            <tr><td colspan="6" class="text-center">NO HAY TIPOS DE DOCUMENTOS DISPONIBLES</td></tr>
        <?php    
            }
        ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" onClick='window.location.assign("<?php echo constant('URL'); ?>/tipodoc/crear")'>Crear Tipo Documento</button>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>