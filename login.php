<?php
include_once('navbar.php');
require_once("autoload.php");
if($_POST){
  $tipoConexion = "MYSQL";
  if($tipoConexion=="JSON"){
      $usuario = new Usuario($_POST["email"],$_POST["password"]);
      $errores= $validar->validacionLogin($usuario);
      if(count($errores)==0){
      
        $usuarioEncontrado = $json->buscarPorEmail($usuario->getEmail());
        if($usuarioEncontrado == null){
          $errores["email"]="Usuario inexistente";
        }else{
          if(Autenticador::verificarPassword($usuario->getPassword(),$usuarioEncontrado["password"] )!=true){
            $errores["password"]="Usuario o clave invalidos";
          }else{
            Autenticador::seteoSesion($usuarioEncontrado);
            if(isset($_POST["recordar"])){
              Autenticador::seteoCookie($usuarioEncontrado);
            }
            if(Autenticador::validarUsuario()){
              redirect("perfil.php");
            }else{
              redirect("registro.php");
            }
          }
        }
      }
  }else{
    
      $usuario = new Usuario($_POST["email"],$_POST["password"]);
      $errores= $validar->validacionLogin($usuario);
      if(count($errores)==0){
        $usuarioEncontrado = BaseMYSQL::buscarPorEmail($usuario->getEmail(),$pdo,'users');
        if($usuarioEncontrado == false){
          $errores["email"]="Usuario inexistente";
        }else{
          if(Autenticador::verificarPassword($usuario->getPassword(),$usuarioEncontrado["password"] )!=true){
            $errores["password"]="Usuario o clave invalidos";
          }else{
            Autenticador::seteoSesion($usuarioEncontrado);
            if(isset($_POST["recordar"])){
              Autenticador::seteoCookie($usuarioEncontrado);
            }
            if(Autenticador::validarUsuario()){
              redirect("perfil.php");
            }else{
              redirect("registro.php");
            }
          }
        }
      }
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/master.css">
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Norican&display=swap" rel="stylesheet">
  <title>Login</title>
</head>

<body>
    <div class="flex-container">
    <div class="main">
      <section class="sin-carousel">
        <article class="ingreso">
          <!--<?php if (isset($errores)):?>
            <ul class="alert alert-danger">
              <?php foreach ($errores as $key => $value) :?>
                <li><?=$value;?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif;?>-->
        </article>
      </section>
    <section class="row text-center">
    <article class="col-12">
        <h2>Inicio de sesión</h2>
        <form action="" method="POST">
          <div class="form-group">
            <label>Email:</label>
            <input class="form-control" name="email" type="text" id="email"   value="" placeholder="Correo electrónico"/>
            <span><?= (isset($errores['email'])) ? $errores["email"] : "" ?></span>
          </div>
          <div class="form-group">
            <label>Contraseña:</label>
            <input class="form-control" name="password" type="password" id="password"  value="" placeholder="Contraseña..." />
            <?= (isset($errores['password'])) ? $errores["password"] : "" ?></span>
          </div>
          <div class="form-group custom-control custom-switch">
            <input name="recordar" type="checkbox" class="custom-control-input" id="customSwitch1" value="recordar"/>
            <label class="custom-control-label" for="customSwitch1">Recordame</label>
          </div>
          <div class="form-group">
            <a href="olvidePassword.php">Olvide mi Contraseña</a>
          </div>
          <div class="form-group text-center mb-3 col-md-12">
            <button class="btn btn-success btn-block btn-rounded z-depth-1" type="submit">Ingresar</button>
          </div>
          <div class="form-group">
            <a href="registro.php">Registrate aca!</a>
          </div>
        </form>
    </article>
  </section>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <?php 
    include_once('footer.php');
    ?>
</body>
</html>