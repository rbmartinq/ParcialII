<?php  
include 'model/conexion.php';
$codigo = $_POST['codigoempleado'];

if($codigo === ''){
    //echo json_encode('error');
	header("Location: index.php");    
}else{
    
    $sentencia = $bd->prepare("DELETE FROM alumno WHERE codigo = ?;");
	$resultado = $sentencia->execute([$codigo]);

	header("Location: index.php");
} 
?>