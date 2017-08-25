<?php

header ('Content-Type: application/json');

include 'config.php';
include 'database-class.php';


$database = new Database();

$database->beginTransaction();
if(isset($_GET['nombre_parametro'])){
	$database->query('SELECT * FROM tabla WHERE parametro="'.$_GET['nombre_parametro'].'"');
}else{
	$database->query('SELECT * FROM tabla');
}

$rows  = $database->resultset();
 
$database->endTransaction();

echo json_encode($rows); // se codifica en json y se imprime todo el arreglo obtenido
