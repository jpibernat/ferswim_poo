<?php
class Preguntas{
    static public function listado($pdo,$tabla){
        $sql="select $tabla.id, $tabla.question, $tabla.answer from $tabla";
        $consulta= $pdo->query($sql);
        $listado=$consulta->fetchall(PDO::FETCH_ASSOC);
        return $listado;
    }
    static public function mostrarPregunta($pdo,$tabla,$idPregunta){
        $sql = "select $tabla.id, $tabla.question, $tabla.answer, from $tabla where $tabla.id = '$idPregunta'";
        $query = $pdo->prepare($sql);
        $query->execute();
        $preguntaEncontrada=$query->fetchAll(PDO::FETCH_ASSOC);
        return $preguntaEncontrada;
    }
    static public function borrarPregunta($pdo,$tabla,$idPregunta){
        $sql="delete from $tabla where $tabla.id=:id";
        $query=$pdo->prepare($sql);
        $query->bindValue(':id',$idPregunta);
        $query->execute();
    }
    static public function modificarPregunta($pdo,$tabla,$idPregunta){
        $sql = "select $tabla.id, $tabla.question, $tabla.answer from $tabla where $tabla.id = '$idPregunta'";
        $query = $pdo->prepare($sql);
        $query->execute();
        $usuarioModificar=$query->fetch(PDO::FETCH_ASSOC);
        return $modificarPregunta;
    }
}