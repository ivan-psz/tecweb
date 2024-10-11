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
        event.preventDefault();
        nombre.focus();
        return false;
    }
    if(nombre.value.length > 100){
        alert('El nombre no debe exceder los 100 caracteres');
        event.preventDefault();
        nombre.focus();
        return false;
    }
    if(marca.value === 'none'){
        alert('Debes seleccionar un valor para la marca');
        event.preventDefault();
        marca.focus();
        return false;
    }
    if(modelo.value === ''){
        alert('Debes llenar el campo del modelo');
        event.preventDefault();
        modelo.focus();
        return false;
    }
    if(modelo.value.length > 25){
        alert('El modelo no debe exceder los 25 caracteres');
        event.preventDefault();
        modelo.focus();
        return false;
    }
    if(!modelo.value.match(/^[a-zA-Z0-9]+$/i)){
        alert('El modelo debe ser un texto alfanumérico');
        event.preventDefault();
        modelo.focus();
        return false;
    }
    if(precio.value === ''){
        alert('Debes llenar el campo del precio');
        event.preventDefault();
        precio.focus();
        return false;
    }
    if(!precio.value.match(/^\d{3,8}\.\d{2}$/)){
        alert('El precio debe ser de tres dígitos a ocho y debe tener dos cifras en los centavos, por ejemplo, 100.00');
        event.preventDefault();
        precio.focus();
        return false;
    }
    if(detalles.value.length > 250){
        alert('Los detalles no deben exceder los 250 caracteres');
        event.preventDefault();
        detalles.focus();
        return false;
    }
    if(isNaN(unidades.value) || unidades.value < 0){
        alert ('Las unidades deben ser un número mayor o igual a cero');
        event.preventDefault();
        unidades.focus();
        return false;
    }

    if(detalles.value === ''){
        detalles.value = 'NULL';
    }
    if(ruta.value === ''){
        ruta.value = 'img/default.jpg';
    }
    console.log('Se pasó la validación.');
    return true;
}

window.onload = function() {
    const formulario = document.getElementById("formularioProductos");
    formulario.addEventListener("submit", validarFormulario);
};

function obtenerDatos(event, id){
    var row = event.target.closest('tr');
    var rowId = row.id;
    var data = row.querySelectorAll(".row-data"); 

    var id = id;
    var nombre = data[0].innerHTML;
    var marca = data[1].innerHTML;
    var modelo = data[2].innerHTML;
    var precio = data[3].innerHTML;
    var detalles = data[4].innerHTML;
    var unidades = data[5].innerHTML;
    var ruta = rowId.querySelector('img').src;

    if(detalles.includes('El producto no tiene detalles')){
        detalles = '';
    }

    if(ruta.includes('/img/default.jpg')){
        ruta = '';
    }

    alert('Nombre: ' + nombre 
        + '\nMarca: ' + marca
        + '\nModelo: ' + modelo
        + '\nPrecio: ' + precio
        + '\nDetalles: ' + detalles
        + '\nUnidades: ' + unidades
        + '\nRuta: ' + ruta
    );

    sendToForm(id, nombre, marca, modelo, precio, detalles, unidades, ruta);
}

function sendToForm(id, nombre, marca, modelo, precio, detalles, unidades, ruta){
    var form = document.createElement("form");

    var nombreIn = document.createElement("input");
    nombreIn.type = 'text';
    nombreIn.name = 'nombreProducto';
    nombreIn.value = nombre;
    form.appendChild(nombreIn);
    
    var marcaIn = document.createElement("input");
    marcaIn.type = 'text';
    marcaIn.name = 'marcaProducto';
    marcaIn.value = marca;
    form.appendChild(marcaIn);

    var modeloIn = document.createElement("input");
    modeloIn.type = 'text';
    modeloIn.name = 'modeloProducto';
    modeloIn.value = modelo;
    form.appendChild(modeloIn);

    var precioIn = document.createElement("input")
    precioIn.type = 'text';
    precioIn.name = 'precioProducto';
    precioIn.value = precio;
    form.appendChild(precioIn);

    var detallesTA = document.createElement("textarea");
    detallesTA.name = 'detallesProducto';
    detallesTA.value = detalles;
    form.appendChild(detallesTA);

    var unidadesIn = document.createElement("input");
    unidadesIn.type = 'number';
    unidadesIn.name = 'unidadesProducto';
    unidadesIn.value = unidades;
    form.appendChild(unidadesIn);

    var imageIn = document.createElement("input");
    imageIn.type = 'text';
    imageIn.name = 'rutaProducto';
    imageIn.value = ruta;
    form.appendChild(imageIn);
    
    console.log(form);
    
    form.method = 'POST';
    form.action = 'http://localhost/tecweb/practicas/p09/formulario_productos_v2.html';  
    
    document.body.appendChild(form);
    form.submit();
}