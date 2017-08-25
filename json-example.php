<?php

header ('Content-Type: application/json');

include 'config.php';
include 'database-class.php';


$database = new Database();

$database->beginTransaction();
if(isset($_GET['param_name'])){
	$database->query('SELECT * FROM table_name WHERE param="'.$_GET['param_name'].'"');
}else{
	$database->query('SELECT * FROM table_name');
}

$rows  = $database->resultset();
$count = $database->rowCount();

if ( $count > 0 ) {
		foreach ( $rows as $r ) {
      echo $r["field_name"];
    }
}
$database->endTransaction();

echo json_encode($rows);
