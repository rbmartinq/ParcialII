<?php
include 'model/conexion.php';
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$anio = $_POST['anio'];

if($nombres === '' || $apellidos=== '' || $anio === 'Elija uno'){
    echo json_encode('error');
}else{
    echo json_encode('Correcto:');
    $sentencia = $bd->prepare("INSERT INTO alumno(nombres, apellidos, anio) VALUES (?,?,?);");
	$resultado = $sentencia->execute([$nombres, $apellidos, $anio]);
}