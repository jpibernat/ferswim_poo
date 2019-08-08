<!DOCTYPE html>

<?php
require_once("autoload.php");
if (isset($_GET["id"])) {
  $id_usuario=$_GET["id"];
  $usuarioAModificar =  Query::usuarioModificar($pdo,'users',$id_usuario);

}

if (isset($_POST["modificar"])) {
    foreach ($_POST as $key => $value) {
    $sql="update users set $key='$value' where users.id=:id";
    $query=$pdo->prepare($sql);
    $query->bindValue(':id',$_POST['id']);
    $query->execute();
    header('Location:listadoUsuariosAdmin.php');
    }
  } elseif (isset($_POST["no"])){
      header('Location:listadoUsuariosAdmin.php');
      exit;
  }

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
  <h2>Modificar Usuario</h2>
<div class="container">


    <form class="" action="" method="post">
        <h3><?= $usuarioAModificar ["name"] ;?></h3>
        <br>
        <?php foreach ($usuarioAModificar as $key => $value) : ?>

            <label><?= $key?> :</label>
            <?php if($key =="id"){?>
                <input type="text" disabled name="<?= $key?>" value="<?= $value?> ">
            <?php }else{?>
                <input type="text" name="<?= $key?>" value="<?= $value?>">
            <?php }?>
            <br>
      <?php endforeach;?>
    <br>
    <p>Esta seguro que quieres modificar este usuario?</p>
      <input type="submit" name="modificar" value="si">
      <input type="submit" name="no" value="no">
      <input type="hidden" name="id" value="<?=$id_usuario;?>">
   </form>
</div>
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
