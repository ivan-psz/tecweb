function ejemploUno(){
    document.write('¡Hola, mundo!');
}

function ejemploDos(){
    var nombre = 'Juan';
    var edad = 10;
    var altura = 1.92;
    var cansado = false;

    document.write('Nombre: ' + nombre);
    document.write('<br/>');
    document.write('Edad de ' + nombre + ': ' + edad);
    document.write('<br/>');
    document.write('Altura de ' + nombre + ': ' + altura);
    document.write('<br/>');
    document.write('¿Está ' + nombre + ' cansado? ' + cansado);
}

function ejemploTres(){
    var nombre;
    var edad;

    nombre = prompt('Ingresa tu nombre: ', '');
    edad = prompt('Ingresa tu edad: ', '');
    document.write('Hola, ');
    document.write(nombre);
    document.write('. ¿Así que tienes ');
    document.write(edad);
    document.write(' años?');
}

function ejemploCuatro(){
    var valor1;
    var valor2;

    valor1 = prompt('Introducir primer número: ', '');
    valor2 = prompt('Introducir segundo número: ', '');

    var suma = parseInt(valor1) + parseInt(valor2);
    var producto = parseInt(valor1) * parseInt(valor2);

    document.write('La suma es: ');
    document.write(suma);
    document.write('<br/>');
    document.write('El producto es: ');
    document.write(producto);
}

function getDatos(){
    var nombre = prompt('Nombre: ', 'Usuario');
    var edad = prompt('Edad: ', 0);

    //USO DE UN OBJETO DE JS QUE PERMITE OBTENER ELEMENTOS DE HTML
    //COMILLAS DOBLES -> EXPANDIR CÓDIGO

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3>Nombre: ' + nombre + '</h3>';

    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3>Edad: ' + edad + '</h3>';
}