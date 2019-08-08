<?php
require_once("helpers.php");
require_once("clases/Usuario.php");
require_once("clases/Validador.php");
require_once("clases/ArmarRegistro.php");
require_once("clases/BaseDatos.php");
require_once("clases/BaseJSON.php");
require_once("clases/Encriptar.php");
require_once("clases/Autenticador.php");
require_once("clases/BaseMYSQL.php");
require_once("clases/Query.php");
require_once("clases/Preguntas.php");



$host = "localhost";
$bd = "fer_swimwear";
$usuario = "root";
$password = "";
$puerto = "3306";
$charset = "utf8mb4";


$pdo = BaseMYSQL::conexion($host,$bd,$usuario,$password,$puerto,$charset);


$validar = new Validador();
$registro = new ArmarRegistro();

Autenticador::iniciarSession();

