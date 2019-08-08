<?php
require_once("autoload.php");

$listadoUsuarios = Query::listado($pdo,'users');

 ?>
<!DOCTYPE html>
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
  <div class="container">
    <div class="">
      <h1>Listado de Usuarios</h1>
    </div>

      <div class="">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Usuarios</th>
              <th scope="col">Mostrar</th>
              <th scope="col">Modificar</th>
              <th scope="col">Borrar</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($listadoUsuarios as $key => $value):?>
                <tr>

                  <th scope="row"><?= $value["id"] ?></th>
                  <td><?=$value["name"];?></td>
                  <td><a href="mostrarUsuarioAdmin.php?id=<?=$value['id'];?>">
                        <i class="far fa-eye"></i>
                      </a>
                  </td>
                  <td><a href="modificarUsuarioAdmin.php?id=<?=$value['id'];?>">
                        <i class="far fa-edit"></i>
                      </a>
                  </td>
                  <td><a href="eliminarUsuarioAdmin.php?id=<?=$value['id'];?>">
                        <i class="far fa-trash-alt"></i>
                      </a>
                  </td>

                </tr>
              <?php endforeach;?>
          </tbody>
      </div>
  </div>
  <a href="perfil.php">Retornar</a>
</body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>
