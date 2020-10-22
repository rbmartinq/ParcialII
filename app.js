//Insertar datos
var formulario = document.getElementById('formulario');
var respuesta = document.getElementById('respuesta');
formulario.addEventListener('submit', function(e){
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('insertar.php',{
        method: 'POST',
        body: datos
    })
        .then( res => res.json())
        .then( data => {
            if(data === 'error'){
                respuesta.innerHTML = `
                <div class="alert alert-danger" role="alert">
                    *Llena todos los campos
                </div>
                `
            }else{
                respuesta.innerHTML = `
                <div class="alert alert-primary" role="alert">
                    Datos ingresados correctamente
                </div>
                `
            }
        } )
})
//Agregar datos al modal
function agregaform(datos){
    d=datos.split('||');
    $('#codigo').val(d[0]);
    $('#editarNombres').val(d[1]);
    $('#editarApellidos').val(d[2]);
    $('#editarAnio').val(d[3]);
}
//editar
var formularioEditar = document.getElementById('editar');
var respuestaEditar = document.getElementById('respuestaEditar')
formularioEditar.addEventListener('submit', function(e){
    e.preventDefault();
    var datosEditar = new FormData(formularioEditar);
    fetch('editarproceso.php',{
        method: 'POST',
        body: datosEditar
    })
        .then( res => res.json())
        .then( data => {
            if(data === 'error'){
                respuestaEditar.innerHTML = `
                <div class="alert alert-danger" role="alert">
                    *Llena todos los campos
                </div>
                `
            }else{
                respuestaEditar.innerHTML = `
                <div class="alert alert-primary" role="alert">
                    Datos ingresados correctamente
                </div>
                `
            }
        } )
})
//Llenar eliminar
function agregaformEliminar(datos){

    d=datos.split('||');
    $('#codigoempleado').val(d[0]);
}
