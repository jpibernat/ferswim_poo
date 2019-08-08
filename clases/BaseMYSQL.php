<?php

class BaseMYSQL extends BaseDatos{
    static public function conexion($host,$db_nombre,$usuario,$password,$puerto,$charset){
        try {
            $dsn = "mysql:host=".$host.";"."dbname=".$db_nombre.";"."port=".$puerto.";"."charset=".$charset;
            $baseDatos = new PDO($dsn,$usuario,$password);
            $baseDatos->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $baseDatos;
        } catch (PDOException $errores) {
            echo "No se puede conectar a la base de datos". $errores->getmessage();
            exit;
        }
    }
    static public function buscarPorEmail($email,$pdo,$tabla){
        $sql = "select * from $tabla where email = :email";
        $query = $pdo->prepare($sql);
        $query->bindValue(':email',$email);
        $query->execute();
        $usuario = $query->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    }

    static public function guardarUsuario($pdo,$usuario,$tabla,$avatar){
        $sql = "insert into $tabla (name,last_name,email,password,avatar,role) values (:name,:last_name,:email,:password,:avatar,:role )";
        $query = $pdo->prepare($sql);
        $query->bindValue(':name',$usuario->getnombre());
        $query->bindValue(':last_name',$usuario->getApellido());
        $query->bindValue(':email',$usuario->getEmail());
        $query->bindValue(':password',Encriptar::hashPassword($usuario->getPassword()));
        $query->bindValue(':avatar',$avatar);
        $query->bindValue('role',1);
        $query->execute();

    }
    public function leer(){
        
    }
    public function actualizar(){
        
    }
    public function borrar(){
        
    }
    public function guardar($usuario){
        
    }

} 