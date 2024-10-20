var baseJSON = {
    "precio": 0.00,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.jpg"
};

function init(){
    var JsonString = JSON.stringify(baseJSON, null, 2);
    document.getElementById('description').value = JsonString;
}

function getXHR(){
    var objetoAJAX;

    try {
        objetoAJAX = new XMLHttpRequest();
    } catch (err1) {
        try {
            objetoAJAX = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (err2) {
            try {
                objetoAJAX = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (err3) {
                objetoAJAX = null;
            }
        }
    }

    return objetoAJAX;
}

function buscarProducto(e){
    e.preventDefault();

    var parametro = document.getElementById('search').value;
    var client = getXHR();

    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function(){
        if(client.readyState == 4 && client.status == 200){
            console.table(client);
            console.log('[CLIENTE]\n' + client.responseText);

            let productos = JSON.parse(client.responseText);

            if(Object.keys(productos).length > 0){

                let template = '';

                productos.forEach(producto => {
                    let descripcion = '';
                    
                    descripcion += '<li>Precio: ' + producto.precio + '</li>';
                    descripcion += '<li>Unidades: ' + producto.unidades + '</li>';
                    descripcion += '<li>Modelo: ' + producto.modelo + '</li>';
                    descripcion += '<li>Marca: ' + producto.marca + '</li>';
                    descripcion += '<li>Detalles: ' + producto.detalles + '</li>';

                    template += `
                        <tr>
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td>
                                <ul>${descripcion}</ul>
                            </td>
                        </tr>
                    `;
                });

                document.getElementById('productos').innerHTML = template;
            }
            else{
                let template = '';
                template += `
                    <tr>
                        <td colspan="3"><strong>No hay productos asociados al parámetro ingresado</strong></td>
                    </tr>
                `;

                document.getElementById('productos').innerHTML = template;
            }
        }
    };
    client.send('parametro=' + parametro);
}

function validarJSON(json){

    const marcasValidas = ['Canon', 'Fujifilm', 'Hasselblad', 'Leica', 'Nikon', 'Olympus', 'Pentax', 'Sony'];
    const regexModelo = /^[a-zA-Z0-9-\s]+$/;
    
    var nombre = json['nombre'];
    var marca = json['marca'];
    var modelo = json['modelo'];
    var precio = json['precio'];
    var detalles = json['detalles'];
    var unidades = parseInt(json['unidades']);
    var ruta = json['imagen'];

    console.log('Datos recibidos en función validarJSON: ' + 
        '\nNombre: ' + nombre +
        '\nMarca: ' + marca +
        '\nModelo: ' + modelo +
        '\nPrecio: ' + precio +
        '\nDetalles: ' + detalles +
        '\nUnidades: ' + unidades +
        '\nRuta: ' + ruta);

    if(nombre === ''){
        alert('Debes llenar el campo del nombre');
        return 1;
    } 
    else if(nombre.length > 100){
        alert('El nombre no debe exceder los 100 caracteres');
        return 1;
    } 
    else if(!marcasValidas.includes(marca)){
        alert('Debes llenar el campo para la marca o poner una marca válida');
        return 2;
    } 
    else if(modelo === '' || modelo === 'XX-000'){
        alert('Debes llenar el campo del modelo');
        return 2;
    } 
    else if(modelo.length > 25){
        alert('El modelo no debe exceder los 25 caracteres');
        return 2;
    } 
    else if(!regexModelo.test(modelo)){
        alert('El modelo debe ser un texto alfanumérico');
        return 2;
    } 
    else if(precio === ''){
        alert('Debes llenar el campo del precio');
        return 2;
    } 
    else if(isNaN(precio) || precio <= 99.99){
        alert('El precio debe ser mayor a 99.99');
        return 2;
    } 
    else if(detalles.length > 250){
        alert('Los detalles no deben exceder los 250 caracteres');
        return 2;
    } 
    else if(isNaN(unidades) || unidades < 0){
        alert ('Las unidades deben ser un número mayor o igual a cero');
        return 2;
    }
    return 0;

}

function limpiarFormulario(){
    var inputNombre = document.getElementById('name');
    var inputDescripcion = document.getElementById('description');

    inputNombre.value = '';
    inputDescripcion.value = JSON.stringify(baseJSON, null, 2);
}

function agregarProducto(e){
    e.preventDefault();

    var productoJsonString = document.getElementById('description').value;
    console.log('productoJsonString:\n' + productoJsonString);

    var finalJSON = JSON.parse(productoJsonString);
    finalJSON['nombre'] = document.getElementById('name').value;
    console.log('finalJSON:\n');
    console.table(finalJSON);

    var resultadoValidacion = validarJSON(finalJSON);

    if(resultadoValidacion != 0){
        if(resultadoValidacion == 1){
            var inputNombre = document.getElementById('name');
            inputNombre.focus(); 
        }
        else{
            var inputDescripcion = document.getElementById('description');
            inputDescripcion.focus();
        }
    }
    else{
        if(finalJSON['imagen'] === ''){
            finalJSON['imagen'] = "img/default.jpg";
        }
        if(finalJSON['detalles'] === 'NA'){
            finalJSON['detalles'] = "";
        }
        finalJSON['precio'] = parseFloat(finalJSON['precio']);
        finalJSON['unidades'] = parseInt(finalJSON['unidades']);

        productoJsonString = JSON.stringify(finalJSON, null, 2);
        console.log('Información a enviar a backend:\n' + productoJsonString);

        var client = getXHR();
        client.open('POST', './backend/create.php', true);
        client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
        client.onreadystatechange = function(){
            if(client.readyState == 4 && client.status == 200){
                console.log(client.responseText);
                window.alert(client.responseText);
                limpiarFormulario();
            }
        };
        client.send(productoJsonString);
    }

}