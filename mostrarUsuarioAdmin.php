<!DOCTYPE html>

<?php
require_once("autoload.php");
$id_usuario=$_GET["id"];
$usuarioSeleccionado = Query::mostrarUsuario($pdo,'users',$id_usuario)
?>
<html lang="es" dir="ltr">
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Norican&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="css/master.css?v=<?php echo time(); ?>">
    <script src="https://use.fontawesome.com/4e066721be.js"></script>
    <script src="https://kit.fontawesome.com/519acca20a.js"></script>
    <title>Fer Swimwear</title>
  </head>
  <body>
    <h1>Datos del usuario</h1>
    <?php foreach ($usuarioSeleccionado as $key => $value):?>
      <h2><?= $value["name"] ;?></h2>
    <?php endforeach;?>
    <ul>
    <?php foreach ($usuarioSeleccionado as $index => $attributes) : ?>
      <?php foreach($attributes as $key => $value): ?>
        <li><?= $key." : ".$value ?> </li>
      <?php endforeach;?>
    <?php endforeach;?>
    </ul>
    <a href="listadoUsuariosAdmin.php">Retornar</a>
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
