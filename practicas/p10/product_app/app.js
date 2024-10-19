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