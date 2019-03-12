function validarFormulario(){

    var txtCategoria = document.getElementById('categoria').value;
    var txtDescripcion = document.getElementById('descripcion').value;

    //Test campo obligatorio
    if(txtCategoria== null || txtCategoria.length == 0 || /^\s+$/.test(txtCategoria)){
        alert('ERROR: El campo nombre no debe ir vacío o lleno de solamente espacios en blanco');
        return false;
    }

    if(txtDescripcion== null || txtDescripcion.length == 0 || /^\s+$/.test(txtDescripcion)){
        alert('ERROR: El campo nombre no debe ir vacío o lleno de solamente espacios en blanco');
        return false;

    }
    return true;


}
