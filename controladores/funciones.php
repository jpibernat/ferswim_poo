<?php
session_start();
require_once("helpers.php");

function validar($datos,$bandera){
    $errores=[];
    if(isset($datos["nombre"])){
        $nombre = trim($datos["nombre"]);
        if(empty($nombre)){
            $errores["nombre"]= "El campo nombre no debe estar vacio";
        }
    }
    
    if(isset($datos["apellido"])){
        $nombre = trim($datos["apellido"]);
        if(empty($apellido)){
            $errores["apellido"]= "El campo apellido no debe estar vacio";
        }
    }

    $email = trim($datos["email"]);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errores["email"]="El Email es invalido";
    }
    $password= trim($datos["password"]);
    if(isset($datos["repassword"])){
        $repassword = trim($datos["repassword"]);
    }
    
    if(empty($password)){
        $errores["password"]= "La contraseña debe tener al menos 6 caracteres";
    }elseif (strlen($password)<6) {
        $errores["password"]="La contraseña debe tener al menos 6 caracteres";
    }
    if(isset($datos["repassword"])){
        if ($password != $repassword) {
            $errores["repassword"]="Las contraseñas no coinciden";
        }
    }
    

    if($bandera == "registro"){
        if($_FILES["avatar"]["error"]!=0){
            $errores["avatar"]="Debe seleccionar una imagen";
        }
        $nombre = $_FILES["avatar"]["name"];
        $ext = pathinfo($nombre,PATHINFO_EXTENSION);
        if($ext != "png" && $ext != "jpg"){
            $errores["avatar"]="La extension del archivo debbe ser .PNG o .JPG";
        }
    
    }

    return $errores;
}

function inputUsuario($campo){
    if(isset($_POST[$campo])){
        return $_POST[$campo];
    }
}

function armarAvatar($imagen){
    $nombre = $imagen["avatar"]["name"];
    $ext = pathinfo($nombre,PATHINFO_EXTENSION);
    $archivoOrigen = $imagen["avatar"]["tmp_name"];
    $archivoDestino = dirname(__DIR__);
    $archivoDestino = $archivoDestino."/imagenes/";
    $avatar = uniqid();
    $archivoDestino = $archivoDestino.$avatar;
    $archivoDestino = $archivoDestino.".".$ext;
    move_uploaded_file($archivoOrigen,$archivoDestino);
    $avatar = $avatar.".".$ext;
    return $avatar;
}


function armarRegistro($datos,$imagen){
    $usuario = [
        "nombre"=>$datos["nombre"],
        "apellido"=>$datos["apellido"],
        "email"=>$datos["email"],
        "password"=> password_hash($datos["password"],PASSWORD_DEFAULT),
        "avatar"=>$imagen,
        "perfil"=>1
    ];
    return $usuario;
}

function guardarUsuario($usuario){
    $jsusuario = json_encode($usuario);
    file_put_contents('usuarios.json',$jsusuario. PHP_EOL, FILE_APPEND);
}

function buscarEmail($email){
    $usuarios = abrirBaseDatos();
    if($usuarios!==null){
        foreach ($usuarios as $usuario) {
            if($email === $usuario["email"]){
                return $usuario;
            }
        }
    }
    
    return null;
}

function abrirBaseDatos(){
    if(file_exists("usuarios.json")){
        $baseDatosJson= file_get_contents("usuarios.json");
        $baseDatosJson = explode(PHP_EOL,$baseDatosJson);
        array_pop($baseDatosJson); 
        foreach ($baseDatosJson as  $usuarios) {
            $arrayUsuarios[]= json_decode($usuarios,true);
        }
        return $arrayUsuarios;
    }else{
        return null;
    }    
}

function armarRegistroOlvide($datos){
    $usuarios = abrirBaseDatos();
    
    foreach ($usuarios as $key=>$usuario) {
        
        if($datos["email"]==$usuario["email"]){
            $usuario["password"]= password_hash($datos["password"],PASSWORD_DEFAULT);
            $usuarios[$key] = $usuario;    
        }
        $usuarios[$key] = $usuario;    
    }
    
    unlink("usuarios.json");
    foreach ($usuarios as  $usuario) {
        $jsusuario = json_encode($usuario);
        file_put_contents('usuarios.json',$jsusuario. PHP_EOL,FILE_APPEND);
    }
}

function seteoUsuario($user,$dato){
    $_SESSION["nombre"]=$user["nombre"];
    $_SESSION["apellido"]=$user["apellido"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["perfil"]= $user["perfil"];
    $_SESSION["avatar"]= $user["avatar"];
    if(isset($dato["recordar"]) ){
        setcookie("email",$dato["email"],time()+3600);
        setcookie("password",$dato["password"],time()+3600);
    }
}

function validarUsuario(){
    if($_SESSION["email"]){
        return true;
    }elseif ($_COOKIE["email"]) {
        $_SESSION["email"]=$_COOKIE["email"];
        return true;
    }else{
        return false;
    }
    
}
