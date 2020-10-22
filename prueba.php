<?php  
    include 'model/conexion.php';
    $sentencia = $bd->query("SELECT * FROM alumno;");
    $alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="es">
 	<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Robinson Martinez</title>
  	</head>
 <body>
 	<hr>
    <h2>USAC - EFPEM</h2>
    <h3>Didáctica de la Programación</h3>
    <h3>Evaluación Parcial II</h3>
    <center><h1>DATOS DE EMPLEADOS</h1></center>
    <hr>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><img src="img/nuevo.jpg" class="rounded float-left" width="100" height="100" alt="Agregar"></button>
    <form id="editarDatos">
    	<table class="table table-striped">
        	<thead>
            	<tr>
                	<th scope="col">Código</th>
                	<th scope="col">Nombres</th>
                	<th scope="col">Apellidos</th>
                	<th scope="col">Año de Nacimiento</th>
                	<th scope="col">Edad</th>
                	<th scope="col" colspan="2">Acciones</th>
            	</tr>
        	</thead>
        <tbody>
        <?php
            foreach ($alumnos as $dato)
            {
            $datos = $dato->codigo."||".
                     $dato->nombres."||".
                     $dato->apellidos."||".
                     $dato->anio."||";
        ?>
        		<tr>
           			<th scope="row"><?php echo $dato->codigo;?> <input type="hidden" name="codigo" value="<?php echo $dato->codigo;?>"></th>
            		<td><?php echo $dato->nombres;?></td>
            		<td><?php echo $dato->apellidos;?></td>
            		<td><?php echo $dato->anio;?></td>
            		<td><?php echo date("Y")-$dato->anio;?></td>
            		<td>
            			<button class="btn btn-sucess" data-toggle="modal" data-target="#editarModal" onclick="agregaform('<?php echo $datos ?>')"><img src="img/editar.jpg" width="50" height="50">
            		<td>
            			<button class="btn btn-sucess" data-toggle="modal" data-target="#editarModal" onclick="agregaform('<?php echo $datos ?>')"><img src="img/eliminar.png" width="50" height="50">
            		</td>
        		</tr> 
        <?php
            }
        ?>    
        </tbody>
</table>
</form>
<hr>
 <!-- Inicia modal insertar-->
 	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formulario">
          <div class="form-group">
            <label for="nombres" class="col-form-label">Nombres</label>
            <input type="text" class="form-control" id="nombres" name="nombres" required="">
            <label for="apellidos-name" class="col-form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required="">
            <label for="anio">Año de Nacimiento</label>
              <select id="anio" class="form-control" name="anio" required="">
                <option selected>Elija uno</option>
                <?php
                    for ($i=1920; $i < date("Y"); $i++) 
                    { 
                        echo "<option>".$i."</option>";
                    }
                ?> 
              </select>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="location.reload()">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="enviar">Guardar</button>
      </div>
        </form>
        <div class="mt-3" id="respuesta"></div></div>
      </div>
    </div>
  </div>
 <!-- Termina modal insertar-->

 <!-- Inicia modal editar-->
 <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 	<div class="modal-dialog" role="document">
 		<div class="modal-content">
 			<div class="modal-header">
 				<h5 class="modal-title" id="exampleModalLabel">Editar Registro</h5>
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true">&times;</span>
 				</button>
 			</div>
 			<div class="modal-body">
 				<form id="editar">
 					<div class="form-group">
 						<label for="nombres" class="col-form-label">Nombre</label>
 						<input type="hidden" name="oculto" id="codigo">
			            <input type="text" class="form-control" id="editarNombres" name="nombres" required="">
			            <label for="apellidos-name" class="col-form-label">Apellidos</label>
			            <input type="text" class="form-control" id="editarApellidos" name="apellidos" required="">
			            <label for="anio">Año de Nacimiento</label>
			            <select id="editarAnio" class="form-control" name="anio" required="">
			            	<option selected>Elija uno</option>
			            	<?php
				            	for ($i=1920; $i < date("Y"); $i++) 
			                    { 
			                        echo "<option>".$i."</option>";
			                    }
			                ?>
			            </select>
			        </div> 
			        <div class="modal-footer">
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="location.reload()">Cerrar</button>
			        	<button type="submit" class="btn btn-primary" id="enviar">Actualizar</button>
			        </div>
			    </form>
			    <div class="mt-3" id="respuestaEditar"></div>
			</div>
		</div>
	</div>
</div>
  <!-- termina modal editar-->


 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    --> 
    <script src="app.js"></script>
    <script src="app2.js"></script>
    <script src="app3.js"></script>
    <footer>
    	<p align="right">Creado por: Robinson Martinez</p>
	</footer>
  </body>
</html>
