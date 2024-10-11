function validarFormulario(event){
    var nombre = document.getElementById('nombreProducto');
    var marca = document.getElementById('marcaProducto');
    var modelo = document.getElementById('modeloProducto');
    var precio = document.getElementById('precioProducto');
    var detalles = document.getElementById('detallesProducto');
    var unidades = document.getElementById('unidadesProducto');
    var ruta = document.getElementById('rutaProducto');

    console.log('Datos recibidos: ' + 
                '\nNombre: ' + nombre.value +
                '\nMarca: ' + marca.options[document.getElementById('marcaProducto').selectedIndex].text +
                '\nModelo: ' + modelo.value +
                '\nPrecio: ' + precio.value +
                '\nDetalles: ' + detalles.value +
                '\nUnidades: ' + unidades.value +
                '\nRuta: ' + ruta.value);

    if(nombre.value === ''){
        alert('Debes llenar el campo del nombre');
        nombre.focus();
        event.preventDefault();
        return false;
    }
    if(nombre.value.length > 100){
        alert('El nombre no debe exceder los 100 caracteres');
        nombre.focus();
        event.preventDefault();
        return false;
    }
    if(marca.value === ''){
        alert('Debes seleccionar un valor para la marca');
        marca.focus();
        event.preventDefault();
        return false;
    }
    if(modelo.value === ''){
        alert('Debes llenar el campo del modelo');
        modelo.focus();
        event.preventDefault();
        return false;
    }
    if(modelo.value.length > 25){
        alert('El modelo no debe exceder los 25 caracteres');
        modelo.focus();
        event.preventDefault();
        return false;
    }
    if(!modelo.value.match(/^[a-zA-Z0-9]+$/i)){
        alert('El modelo debe ser un texto alfanumérico');
        modelo.focus();
        event.preventDefault();
        return false;
    }
    if(precio.value === ''){
        alert('Debes llenar el campo del precio');
        precio.focus();
        event.preventDefault();
        return false;
    }
    if(!precio.value.match(/^\d{3,8}\.\d{2}$/)){
        alert('El precio debe ser de tres dígitos a ocho y debe tener dos cifras en los centavos, por ejemplo, 100.00');
        precio.focus();
        event.preventDefault();
        return false;
    }
    if(detalles.value.length > 250){
        alert('Los detalles no deben exceder los 250 caracteres');
        detalles.focus();
        event.preventDefault();
        return false;
    }
    if(isNaN(unidades.value) || unidades.value < 0){
        alert ('Las unidades deben ser un número mayor o igual a cero');
        unidades.focus();
        event.preventDefault();
        return false;
    }
    
    if(detalles.value === ''){
        detalles.value = 'NULL';
    }
    if(ruta.value === ''){
        ruta.value = './img/default.jpg';
    }
    console.log('Se pasó la validación.');
    return true;
}

window.onload = function() {
    const formulario = document.getElementById("formularioProductos");
    formulario.addEventListener("submit", validarFormulario);
};