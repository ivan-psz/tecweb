function validar(){
    var nombre = document.getElementById('nombreProducto').value;
    var marca = document.getElementById('marcaProducto').options[document.getElementById('marcaProducto').selectedIndex].text;
    var modelo = document.getElementById('modeloProducto').value;
    var precio = document.getElementById('precioProducto').value;
    var detalles = document.getElementById('detallesProducto').value;
    var unidades = document.getElementById('unidadesProducto').value;
    var ruta = document.getElementById('rutaProducto').value;

    console.log('Datos recibidos: ' + 
                '\nNombre: ' + nombre +
                '\nMarca: ' + marca +
                '\nModelo: ' + modelo +
                '\nPrecio: ' + precio +
                '\nDetalles: ' + detalles +
                '\nUnidades: ' + unidades +
                '\nRuta: ' + ruta);

}