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

/*

    LÓGICA A MANTENER

    i. Cargar toda la lista de productos NO eliminados al abrir la página.

    ii. Cargar la tabla de productos NO eliminados que coincidan con lo que se
        “vaya” tecleando en el campo de búsqueda.

    iii. Cargar en la barra de estado los nombres de los productos NO eliminados
        coincidentes con lo que se “vaya” tecleando en el campo de búsqueda.

    iv. Recibir un estatus y un mensaje al registrar un producto; ya sea que la
        inserción sea exitosa o no.

    v. Cargar toda la lista de productos NO eliminados al presionar el botón de
        “Agregar Producto”, esto para visualizar inmediatamente la lista
        actualizada.

    vi. Cargar toda la lista de productos NO eliminados después presionar el botón
        “Eliminar”, esto para visualizar inmediatamente la lista actualizada.

*/

$(document).ready(function(){

    console.log('jQuery ha cargado');

    $('#product-result').hide();
    fetchProducts();

    //Función para buscar artículos

    $('#search').keyup(function(e){
        if($('#search').val()){
            let search = $('#search').val();
            $.ajax({
                url: './backend/product-search.php',
                type: 'POST',
                data: { search },
                success: function(response){
                    let productos = JSON.parse(response);
                    let template = '';
    
                    console.log('Productos recibidos del servidor: ')
                    console.table(productos);
    
                    if(productos.length == 0){
                        template += `<strong>No hay productos asociados al parámetro ingresado.</strong>`;
                    }
                    else{
                        productos.forEach(producto => {
                            console.log('Producto en proceso: ');
                            console.table(producto);
        
                            template += `<li>${producto.nombre}</li>`;
                        });
                    }
                    $('#container').html(template);
                    $('#product-result').show();
                }
            });
        }
        else{
            $('#product-result').hide();
        }
    });

    //Función para crear artículos

    $('#product-form').submit(function(e) {
        e.preventDefault();

        const productoJsonString = $('#description').val();
        let finalJSON = JSON.parse(productoJsonString);
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
            $.post('./backend/product-add.php', finalJSON, function(response){
                let serverResponse = JSON.parse(response);
                $('#product-form').trigger('reset');
                if(serverResponse['status'] === 'error'){
                    template = '';
                    template += `
                                    <li>${serverResponse.status}</li>
                                    <li>${serverResponse.message}</li>
                                `;
                    $('#container').html(template);
                    $('#product-result').show();
                }
                else{
                    template = '';
                    template += `
                                    <li>${serverResponse.status}</li>
                                    <li>${serverResponse.message}</li>
                                `;
                    $('#container').html(template);
                    $('#product-result').show();
                    fetchProducts();
                }
            });
        }
        
    });

    //Función para obtener todos los productos no eliminados

    function fetchProducts(){
        $.ajax({
            url: './backend/product-list.php',
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
                        template += `
                            <tr productid="${product.id}" productname="${product.name}">
                                <td>${product.id}</td>
                                <td>${product.name}</td>
                                <td>${product.description}</td>
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

    $(document).on('click', '.product-delete', function(){
        let row = $(this)[0].parentElement.parentElement;
        let name = $(row).attribute('productname');

        if(confirm('¿De verdad quieres eliminar ' + name + '?')){
            $.post('./backend/product-delete.php', {id}, function(response){
                let id = $(row).attribute('productid');
                let serverResponse = JSON.parse(response);
                    if(serverResponse['status'] === 'error'){
                        template = '';
                        template += `
                                        <li>${serverResponse.status}</li>
                                        <li>${serverResponse.message}</li>
                                    `;
                        $('#container').html(template);
                        $('#product-result').show();
                    }
                    else{
                        template = '';
                        template += `
                                        <li>${serverResponse.status}</li>
                                        <li>${serverResponse.message}</li>
                                    `;
                        $('#container').html(template);
                        $('#product-result').show();
                        fetchProducts();
                    }
            });
        }
    });

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
