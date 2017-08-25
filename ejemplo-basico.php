<?php

include 'config.php';
include 'database-class.php';

$database = new Database();
$database->beginTransaction();

// Consulta con/sin parametro
if(isset($_GET['nombre_parametro'])){
	$database->query('SELECT * FROM tabla WHERE parametro="'.$_GET['nombre_parametro'].'"');
}else{
	$database->query('SELECT * FROM tabla');
}

//Extraer los resultados
$rows  = $database->resultset();

//Contar los resultados
$count = $database->rowCount();

if ( $count > 0 ) {
  
  // impresion de los resultados
		foreach ( $rows as $r ) {
      echo $r["campo1"];
      echo $r["campo2"];
    }
}
$database->endTransaction();
