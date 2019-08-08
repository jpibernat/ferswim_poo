<?php
include_once('navbar.php');
require_once("autoload.php");
if ($_POST){
  
  $tipoConexion = "MYSQL";
  
  if($tipoConexion=="JSON"){
    $usuario = new Usuario($_POST["email"],$_POST["password"],$_POST["repassword"],$_POST["nombre"],$_POST["apellido"],$_FILES );
  
    $errores = $validar->validacionUsuario($usuario, $_POST["repassword"]);
    
    if(count($errores)==0){
      $usuarioEncontrado = $json->buscarEmail($usuario->getEmail());
      
      if($usuarioEncontrado != null){
        $errores["email"]="Usuario ya registrado";
      }else{
        $avatar = $registro->armarAvatar($usuario->getAvatar());
        $registroUsuario = $registro->armarUsuario($usuario,$avatar);
      
        $json->guardar($registroUsuario);
      
        redirect ("login.php");
      }
    }
  }
 else{
  
  $usuario = new Usuario($_POST["email"],$_POST["password"],$_POST["repassword"],$_POST["nombre"],$_POST["apellido"],$_FILES );
  
  $errores = $validar->validacionUsuario($usuario, $_POST["repassword"]);
  
  if(count($errores)==0){
    
    $usuarioEncontrado = BaseMYSQL::buscarPorEmail($usuario->getEmail(),$pdo,'users');
    if($usuarioEncontrado != false){
      $errores["email"]= "Usuario ya Registrado";
    }else{
      
      $avatar = $registro->armarAvatar($usuario->getAvatar());
      
      BaseMYSQL::guardarUsuario($pdo,$usuario,'users',$avatar);
      
      redirect ("login.php");
    }
  }

 } 
}


?>
<!DOCTYPE html>
<html lang="es">

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
    <?php
      if(isset($errores)):?>
        <ul class="alert alert-danger">
          <?php
          foreach ($errores as $key => $value) :?>
            <li> <?=$value;?> </li>
            <?php endforeach;?>
        </ul>
      <?php endif;?>

  
    <section class="row  text-center ">
      <article class="col-12  " >
          <h2>Registrate</h2>
          <form action="" method="POST" enctype= "multipart/form-data"  >
            <label>Nombre:</label>
            
            <input class="form-control" name="nombre" type="text" id="nombre"  value="<?=(isset($errores["nombre"]) )? "" : inputUsuario("nombre");?>" placeholder="Nombre" />
            <br>

            <label>Apellido:</label>
            
            <input class="form-control" name="apellido" type="text" id="apellido"  value="<?=(isset($errores["apellido"]) )? "" : inputUsuario("apellido");?>" placeholder="Apellido" />
            <br>
            
            <label>Email:</label>
          
            <input class="form-control" name="email" type="text" id="email" value="<?=isset($errores["email"])? "":inputUsuario("email") ;?>" placeholder="Correo electrónico"/>
            <br>
            <label>Contraseña:</label>
          
            <input class="form-control" name="password" type="password" id="password" value="" placeholder="Contraseña" />
            <br>
            <label>Confirmar contraseña:</label>
            
            <input class="form-control" name="repassword" type="password" id="repassword" value="" placeholder="Repita su contraseña" />
            <br>
            <div class="custom-file">
             <input type="file" name="avatar" class="custom-file-input" value="" />
             <label class="custom-file-label" for="validatedCustomFile" style="text-align: left;">Seleccione un avatar</label>
           <div class="invalid-feedback">Example invalid custom file feedback</div>
            <span><?= (isset($errores['avatar'])) ? $errores["avatar"] : "" ?></span>
           </div>
           <br>
            <br>
            <button class= "btn btn-success btn-block btn-rounded z-depth-1" type="submit">Enviar</button>
            <button  class="btn btn-secondary btn-block btn-rounded z-depth-1" type="reset">Restablecer</button>
          </form>
        
      </article> 
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </div>
  <!-- Footer -->
<?php 
include_once('footer.php');
?>
</body>
</html>
