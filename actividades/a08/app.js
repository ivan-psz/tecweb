var mensaje = {
    "status": "",
    "message": "" 
};

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
        
        let producto = {
            "id": $('#productId').val(),
            "nombre": $('#name').val(),
            "marca": $('#brand').val(),
            "modelo": $('#model').val(),
            "precio": $('#price').val(),
            "detalles": $('#details').val() === '' ? '' : $('#details').val(),
            "unidades": $('#units').val(),
            "imagen": $('#path').val() === '' ? 'img/defaul.jpg' : $('#path').val()
        };

        const resultadoValidacion = validarFormularioVacio();

        if(!resultadoValidacion){
            mensaje['status'] = 'error';
            mensaje['message'] = 'Formulario vacío';
            let template = `
                                <li>${mensaje.status}</li>
                                <li>${mensaje.message}</li>
                            `;

            $('#product-result').show();
            $('#container').html(template);
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
                modificarBoton();
            });
        }
        edit = false;
    });

    //Función para obtener todos los productos no eliminados

    function fetchProducts(){
        modificarBoton();
        $.ajax({
            url: 'backend/product-list.php',
            type: 'GET',
            success: function(response){
                console.log(response);
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
        edit = true;
        let row = $(this)[0].parentElement.parentElement;
        let id = $(row).attr('productid');
        $.post('backend/product-single.php', {id}, function(response){
            modificarBoton();
            
            let product = JSON.parse(response);

            $('#productId').val(product['id']);
            $('#name').val(product['nombre']);

            delete product.id;
            delete product.nombre;
            let description = JSON.stringify(product, null, 2);
            $('#description').val(description);
        });
    });

    $(document).on('focusout', '.form-control', function(){
        let campo = $(this).attr('id');
        
        if(validarCampo(campo)){
            let template = `
                            <li>${mensaje.status}</li>
                            <li>${mensaje.message}</li>
                        `;

            $('#product-result').show();
            $('#container').html(template);
            return true;
        }
        else{
            mensaje['status'] = '';
            mensaje['message'] = '';
            $('#product-result').hide();
        }
        return false;
    });


    $('#name').keyup(function(e){
        if($('#name').val()){
            let name = $('#name').val();
            $.ajax({
                url: 'backend/product-single-by-name.php',
                type: 'POST',
                data: { name },
                success: function(response){
                    let mensaje = JSON.parse(response);
                    if(mensaje['status'] === 'error'){
                        template = '';
                        template += `
                                        <li>${mensaje.status}</li>
                                        <li>${mensaje.message}</li>
                                    `;
                        $('#product-result').show();
                        $('#container').html(template);
                    }
                    else{
                        $('#product-result').hide();
                    }
                }
            });
        }
        else{
            $('#product-result').hide();
        }
    });

    function validarCampo(campo) {
        let valor = $('#' + campo).val();
        let ban = false;
        const regexModelo = /^[a-zA-Z0-9-\s]+$/;
        const regexRuta = /^img\/[a-zA-Z0-9._-]{1,94}\.jpg$/;

        if(campo === 'name'){
            if(valor === ''){
                mensaje['status'] = 'error';
                mensaje['message'] = 'El nombre es requerido';
                ban = true;
            }
            else if(valor.length > 100){
                mensaje['status'] = 'error';
                mensaje['message'] = 'El nombre debe ser menor a 100 caracteres';
                ban = true;
            }
            else{
                ban = false;
            }
        }
        else if(campo === 'brand'){
            if(valor === 'none'){
                mensaje['status'] = 'error';
                mensaje['message'] = 'Debes seleccionar una marca';
                ban = true;
            }
            else{
                ban = false;
            }
        }
        else if(campo === 'model'){
            if(valor === ''){
                mensaje['status'] = 'error';
                mensaje['message'] = 'El modelo es requerido';
                ban = true;
            } 
            else if(valor.length > 25){
                mensaje['status'] = 'error';
                mensaje['message'] = 'El modelo debe ser menor a 25 caracteres';
                ban = true;
            }
            else if(!regexModelo.test(valor)){
                mensaje['status'] = 'error';
                mensaje['message'] = 'El modelo debe ser alfanumérico';
                ban = true;
            }
            else{
                ban = false;
            }
        }
        else if(campo === 'price'){
            if(valor === ''){
                mensaje['status'] = 'error';
                mensaje['message'] = 'El precio es requerido';
                ban = true;
            } 
            else if(isNaN(valor) || valor <= 99.99){
                mensaje['status'] = 'error';
                mensaje['message'] = 'El precio debe ser un número mayor o igual a 100';
                ban = true;
            } 
            else{
                ban = false;
            }
        }
        else if(campo === 'details'){
            if(valor.length > 250){
                mensaje['status'] = 'error';
                mensaje['message'] = 'Los detalles no deben exceder los 250 caracteres';
                ban = true;
            }
            else{
                ban = false;
            }
        }
        else if(campo === 'units'){
            if(valor === ''){
                mensaje['status'] = 'error';
                mensaje['message'] = 'Las unidades son requeridas';
                ban = true;
            }
            else if(isNaN(valor) || valor < 0){
                mensaje['status'] = 'error';
                mensaje['message'] = 'Las unidades deben ser un número mayor o igual a cero';
                ban = true;
            }
            else{
                ban = false;
            }
        }
        else if(campo === 'path'){
            if(!regexRuta.test(valor) && valor !== ''){
                mensaje['status'] = 'error';
                mensaje['message'] = "No es el formato de las rutas (texto alfanumérico que comience con 'img/' y finalice con '.jpg')";
                ban = true;
            }
            else{
                ban = false;
            }
        }

        if(ban === true){ 
            return true;                  
        }
        return false;

    }

    function modificarBoton(){
        $('#botonFormulario').html(edit === false ? 'Agregar producto' : 'Editar producto');
    }
});

function validarFormularioVacio(){

    const regexModelo = /^[a-zA-Z0-9-\s]+$/;
    const regexRuta = /^img\/[a-zA-Z0-9._-]{1,94}\.jpg$/;

    let producto = {
        "id": $('#productId').val(),
        "nombre": $('#name').val(),
        "marca": $('#brand').val(),
        "modelo": $('#model').val(),
        "precio": $('#price').val(),
        "detalles": $('#details').val(),
        "unidades": $('#units').val(),
        "imagen": $('#path').val()
    };
        
    if(producto['nombre'] === ''){
        return false;
    }
    if(producto['nombre'].length > 100){
        return false;
    }

    if(producto['marca'] === 'none'){
        return false;
    }

    if(producto['modelo'] === ''){
        return false;
    }
    if(producto['modelo'].length > 25){
        return false;
    }
    if(!regexModelo.test(producto['modelo'])){
        return false;
    }

    if(producto['precio'] === ''){
        return false;
    }
    if(isNaN(producto['precio']) || producto['precio'] <= 99.99){
        return false;
    } 

    if(producto['detalles'].length > 250){
        return false;
    }

    if(producto['unidades'] === ''){
        return false;
    }
    if(isNaN(producto['unidades']) || producto['unidades'] < 0){
        return false;
    }

    if(!regexRuta.test(producto['imagen']) && producto['imagen'] !== ''){
        return false;
    }

    return true;
}