<?php
class Validador{

    public function validacionUsuario($usuario){
        
        $errores=array();
        $nombre = trim($usuario->getNombre());
        if(isset($nombre)) {
            if(empty($nombre)){
                $errores["nombre"]= "El campo nombre no puede estar vacio";
            }
        }
        
        $apellido = trim($usuario->getApellido());
        if(isset($apellido)) {
            if(empty($apellido)){
                $errores["apellido"]= "El campo apellido no puede estar vacio";
            }
        }

        $email = trim($usuario->getEmail());
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errores["email"]="Introduzca un Email valido";
        }
        $password= trim($usuario->getPassword());
   
        $repassword = trim($usuario->getRepassword());
        

        if(empty($password)){
            $errores["password"]= "El campo no puede estar vacio";
        }elseif (strlen($password)<6) {
            $errores["password"]="La contraseña debe tener como mínimo 6 caracteres";
        }
        if(isset($repassword)){
            if ($password != $repassword) {
                $errores["repassword"]="Las contraseñas no coinciden";
            }
        }
        if($usuario->getAvatar()!=null){
            if($_FILES["avatar"]["error"]!=0){
                $errores["avatar"]="Se debe subir una imagen";
            }else{
                $nombre = $_FILES["avatar"]["name"];
                $ext = pathinfo($nombre,PATHINFO_EXTENSION);
                if($ext != "png" && $ext != "jpg"){
                    $errores["avatar"]="La extension del  archivo debe ser .PNG o .JPG";
                }
            }
        }
    
        return $errores;
    }

    public function validacionLogin($usuario){
        $errores=array();
    
        $email = trim($usuario->getEmail());
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errores["email"]="Email invalido";
        }
        $password= trim($usuario->getPassword());
       
        if(empty($password)){
            $errores["password"]= "El campo no puede estar vacio";
        }elseif (strlen($password)<6) {
            $errores["password"]="La contraseña debe tener como mínimo 6 caracteres";
        }
    
        return $errores;
    }
    
    public function validacionOlvide($usuario){
        
        $errores=array();
    
        $email = trim($usuario->getEmail());
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errores["email"]="Email invalido";
        }
        $password= trim($usuario->getPassword());
   
        $repassword = trim($usuario->getRepassword());
        

        if(empty($password)){
            $errores["password"]= "El campo no puede estar vacio";
        }elseif (strlen($password)<6) {
            $errores["password"]="La contraseña debe tener como mínimo 6 caracteres";
        }
        if(empty($repassword)){
            $errores["repassword"]= "El campo no puede estar vacio";
        }
    
        return $errores;
    }


}