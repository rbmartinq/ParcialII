<?php
include 'model/conexion.php';
$codigo = $_POST['oculto'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$anio = $_POST['anio'];


if($nombres === '' || $apellidos=== '' || $anio === 'Elija uno'){
    echo json_encode('error');
}else{
    echo json_encode('Correcto:');
    $sentencia = $bd->prepare("UPDATE alumno SET nombres = ?, apellidos = ?, anio = ? WHERE codigo = ?;");
	$resultado = $sentencia->execute([$nombres, $apellidos, $anio,  $codigo]);
}