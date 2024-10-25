var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
};

function init() {
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}

$(document).ready(function(){
    console.log('jQuery ha cargado');

    let edit = false;
    $('#product-result').hide();
    fetchProducts();

    //Función para buscar artículos

    $('#search').keyup(function(e){
        if($('#search').val()){
            let search = $('#search').val();
            $.ajax({
                url: 'backend/product-search.php',
                type: 'POST',
                data: { search },
                success: function(response){
                    let productos = JSON.parse(response);
                    let productNames = '';
                    let template = '';

                    if(productos.length == 0){
                        productNames += `<li><strong>No hay productos asociados al parámetro ingresado.</strong></li>`;
                    }
                    else{
                        productos.forEach(producto => {
                            productNames += `<li>${producto.nombre}</li>`;

                            let description = '';
                            description += `
                                                <li>precio: ${producto.precio}</li>
                                                <li>unidades: ${producto.unidades}</li>
                                                <li>modelo: ${producto.modelo}</li>
                                                <li>marca: ${producto.marca}</li>
                                                <li>detalles: ${producto.detalles}</li>
                                            `;
                            template += `
                                            <tr productid="${producto.id}" productname="${producto.nombre}">
                                                <td>${producto.id}</td>
                                                <td>
                                                    <a href="#" class="product-item">${producto.nombre}</a>
                                                </td>
                                                <td>${description}</td>
                                                <td>
                                                    <button class="product-delete btn btn-danger">
                                                        Eliminar
                                                    </button>
                                                </td>
                                            </tr>
                                        `;
                        });
                    }
                    $('#product-result').show();
                    $('#container').html(productNames);
                    $('#products').html(template);
                }
            });
        }
        else{
            $('#product-result').hide();
            fetchProducts();
        }
    });

    //Función para crear o editar artículos

    $('#product-form').submit(function(e) {
        e.preventDefault();

        let productoJsonString = $('#description').val();
        let finalJSON = JSON.parse(productoJsonString);
        finalJSON['id'] = $('#productId').val();
        finalJSON['nombre'] = $('#name').val();

        const resultadoValidacion = validarJSON(finalJSON);

        if(resultadoValidacion != 0){
            if(resultadoValidacion == 1){
                $('#name').focus();
            }
            else{
                $('#description').focus();
            }
        }
        else{
            let url = edit === false ? 'backend/product-add.php' : 'backend/product-update.php';
            productoJsonString = JSON.stringify(finalJSON, null, 2);
            $.post(url, productoJsonString, function(response){
                let serverResponse = JSON.parse(response);
                $('#description').val(JSON.stringify(baseJSON,null,2));
                $('#name').val('');
                $('#product-form').val();
                if(serverResponse['status'] === 'error'){
                    template = '';
                    template += `
                                    <li>${serverResponse.status}</li>
                                    <li>${serverResponse.message}</li>
                                `;
                }
                else{
                    template = '';
                    template += `
                                    <li>${serverResponse.status}</li>
                                    <li>${serverResponse.message}</li>
                                `;
                    fetchProducts();
                }
                $('#product-result').show();
                $('#container').html(template);
            });
        }
        edit = false;
    });

    //Función para obtener todos los productos no eliminados

    function fetchProducts(){
        $.ajax({
            url: 'backend/product-list.php',
            type: 'GET',
            success: function(response){
                let productList = JSON.parse(response);
                let template = '';
                if(productList.length == 0){
                    template += `<tr>
                                    <td colspan="3"><strong>¡Aún no existen productos en la base de datos!</strong></td>
                                </tr>`;
                }
                else{
                    productList.forEach(product => {
                        let description = '';
                            description += `
                                                <li>precio: ${product.precio}</li>
                                                <li>unidades: ${product.unidades}</li>
                                                <li>modelo: ${product.modelo}</li>
                                                <li>marca: ${product.marca}</li>
                                                <li>detalles: ${product.detalles}</li>
                                            `;

                        template += `
                            <tr productid="${product.id}" productname="${product.nombre}">
                                <td>${product.id}</td>
                                <td>
                                    <a href="#" class="product-item">${product.nombre}</a>
                                </td>
                                <td>${description}</td>
                                <td>
                                    <button class="product-delete btn btn-danger">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                }
                $('#products').html(template);
            }
        });
    }

    //Función para eliminar

    $(document).on('click', '.product-delete', function(){
        let row = $(this)[0].parentElement.parentElement;
        let name = $(row).attr('productname');

        if(confirm('¿De verdad quieres eliminar ' + name + '?')){
            let id = $(row).attr('productid');
            $.post('backend/product-delete.php', {id}, function(response){
                let serverResponse = JSON.parse(response);
                if(serverResponse['status'] === 'error'){
                    template = '';
                    template += `
                                    <li>${serverResponse.status}</li>
                                    <li>${serverResponse.message}</li>
                                `;
                }
                else{
                    template = '';
                    template += `
                                    <li>${serverResponse.status}</li>
                                    <li>${serverResponse.message}</li>
                                `;
                    fetchProducts();
                }
                $('#product-result').show();
                $('#container').html(template);
            });
        }
    });

    //Función para obtener un artículo

    $(document).on('click', '.product-item', function(){
        let row = $(this)[0].parentElement.parentElement;
        let id = $(row).attr('productid');
        $.post('backend/product-single.php', {id}, function(response){
            edit = true;
            let product = JSON.parse(response);

            $('#productId').val(product['id']);
            $('#name').val(product['nombre']);

            delete product.id;
            delete product.nombre;
            let description = JSON.stringify(product, null, 2);
            $('#description').val(description);
        });
    });

    $('#botonFormulario').html(edit === false ? 'Agregar producto' : 'Editar producto');

});

//Función para la validación del formulario

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
