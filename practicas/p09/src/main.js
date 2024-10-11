function validarFormulario(event){
    event.preventDefault();

    var nombre = document.getElementById('nombre');
    var marca = document.getElementById('marca');
    var modelo = document.getElementById('modelo');
    var precio = document.getElementById('precio');
    var detalles = document.getElementById('detalles');
    var unidades = document.getElementById('unidades');
    var ruta = document.getElementById('ruta');

    console.log('Datos recibidos: ' + 
                '\nNombre: ' + nombre.value +
                '\nMarca: ' + marca.options[document.getElementById('marca').selectedIndex].text +
                '\nModelo: ' + modelo.value +
                '\nPrecio: ' + precio.value +
                '\nDetalles: ' + detalles.value +
                '\nUnidades: ' + unidades.value +
                '\nRuta: ' + ruta.value);

    if(nombre.value === ''){
        alert('Debes llenar el campo del nombre');
        nombre.focus();
        return false;
    } 
    else if(nombre.value.length > 100){
        alert('El nombre no debe exceder los 100 caracteres');
        nombre.focus();
        return false;
    } 
    else if(marca.value === 'none'){
        alert('Debes seleccionar un valor para la marca');
        marca.focus();
        return false;
    } 
    else if(modelo.value === ''){
        alert('Debes llenar el campo del modelo');
        modelo.focus();
        return false;
    } 
    else if(modelo.value.length > 25){
        alert('El modelo no debe exceder los 25 caracteres');
        modelo.focus();
        return false;
    } 
    else if(!modelo.value.match(/^[a-zA-Z0-9]+$/i)){
        alert('El modelo debe ser un texto alfanumérico');
        modelo.focus();
        return false;
    } 
    else if(precio.value === ''){
        alert('Debes llenar el campo del precio');
        precio.focus();
        return false;
    } 
    else if(!precio.value.match(/^\d{3,8}\.\d{2}$/)){
        alert('El precio debe ser de tres dígitos a ocho y debe tener dos cifras en los centavos, por ejemplo, 100.00');
        precio.focus();
        return false;
    } 
    else if(detalles.value.length > 250){
        alert('Los detalles no deben exceder los 250 caracteres');
        detalles.focus();
        return false;
    } 
    else if(isNaN(unidades.value) || unidades.value < 0){
        alert ('Las unidades deben ser un número mayor o igual a cero');
        unidades.focus();
        return false;
    }
    else{
        if(detalles.value === ''){
            detalles.value = 'NULL';
        }
        if(ruta.value === ''){
            ruta.value = 'img/default.jpg';
        }
        document.getElementById('formularioProductos').submit();
        return true;
    }
}

window.onload = function() {
    const formulario = document.getElementById("formularioProductos");
    formulario.addEventListener("submit", validarFormulario);
};

function obtenerDatos(event, id){
    var row = event.target.closest('tr');
    var data = row.querySelectorAll(".row-data"); 

    var nombre = data[1].innerHTML;
    var marca = data[2].innerHTML;
    var modelo = data[3].innerHTML;
    var precio = data[4].innerHTML;
    var detalles = data[5].innerHTML;
    var unidades = data[6].innerHTML;
    var ruta = data[7].querySelector('img').src;;

    var inicioRuta = 'img/';
    var indiceRuta = ruta.indexOf(inicioRuta);
    if (indiceRuta !== -1) {
        ruta = ruta.substring(indiceRuta); 
    }

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

    var idIn = document.createElement("input");
    idIn.type = 'hidden';
    idIn.name = 'id';
    idIn.value = id;
    form.appendChild(idIn);

    var idIn = document.createElement("input");
    idIn.type = 'hidden';
    idIn.name = 'id';
    idIn.value = id;
    form.appendChild(idIn);

    var nombreIn = document.createElement("input");
    nombreIn.type = 'text';
    nombreIn.name = 'nombre';
    nombreIn.id = 'nombre';
    nombreIn.value = nombre;
    form.appendChild(nombreIn);
    
    var marcaSel = document.createElement("select");
    marcaSel.name = 'marca';
    marcaSel.id = 'marca';

    var marcas = ['Canon', 'Fujifilm', 'Hasselblad', 'Leica', 'Nikon', 'Olympus', 'Pentax', 'Sony'];

    marcas.forEach(function(marcaItem) {
        var marcaOpt = document.createElement("option");
        marcaOpt.value = marcaItem.toLowerCase();  
        marcaOpt.text = marcaItem;  
        
        if (marcaItem === marca) {
            marcaOpt.selected = true;
        }
        marcaSel.appendChild(marcaOpt);
    });
    
    form.appendChild(marcaSel);
    
    var modeloIn = document.createElement("input");
    modeloIn.type = 'text';
    modeloIn.name = 'modelo';
    modeloIn.id = 'modelo';
    modeloIn.value = modelo;
    form.appendChild(modeloIn);

    var precioIn = document.createElement("input")
    precioIn.type = 'text';
    precioIn.name = 'precio';
    precioIn.id = 'precio';
    precioIn.value = precio;
    form.appendChild(precioIn);

    var detallesTA = document.createElement("textarea");
    detallesTA.name = 'detalles';
    detallesTA.id = 'detalles'; 
    detallesTA.innerHTML = detalles;
    form.appendChild(detallesTA);

    var unidadesIn = document.createElement("input");
    unidadesIn.type = 'number';
    unidadesIn.name = 'unidades';
    unidadesIn.id = 'unidades';
    unidadesIn.value = unidades;
    form.appendChild(unidadesIn);

    var imageIn = document.createElement("input");
    imageIn.type = 'text';
    imageIn.name = 'ruta';
    imageIn.id = 'ruta';
    imageIn.value = ruta;
    form.appendChild(imageIn);
    
    console.log(form);
    
    form.method = 'POST';
    form.action = 'http://localhost/tecweb/practicas/p09/formulario_productos_v2.php';  

    document.body.appendChild(form);
    form.submit();
}