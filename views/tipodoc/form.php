<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Crear Tipo Documento</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="container" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Nuevo Tipo de documento</h1>
        <div class="col-sm-6 offset-sm-3">
        <form action="<?php echo constant('URL'); ?>tipodoc/crear" method="POST">

            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" name="id" id="id">
                <small id="idHelp" class="form-text text-muted">Diligencie el tipo de documento</small>
            </div>
            <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion">
            <small id="descripcionHelp" class="form-text text-muted">Ingrese la descripción del tipo de documento</small>
            </div>
            <input type="submit" class="btn btn-primary" value="Crear tipo documento">
        </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>