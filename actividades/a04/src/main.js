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

function ejemploCinco(){
    var nombre;
    var nota;

    nombre = prompt('Ingresa tu nombre: ', '');
    nota = prompt('Ingresa tu nota: ', '');

    if(nota >= 4){
        document.write(nombre + ' está aprobado con un ' + nota);
    }
}

function ejemploSeis(){
    var num1, num2;

    num1 = prompt('Ingresa el primer número: ', '');
    num2 = prompt('Ingresa el segundo número: ', '');

    num1 = parseInt(num1);
    num2 = parseInt(num2);

    if(num1 > num2){
        document.write('El mayor es: ' + num1);
    }
    else{
        document.write('El mayor es: ' + num2);
    }
}

function ejemploSiete(){
    var nota1, nota2, nota3;

    nota1 = prompt('Ingresa la 1ra. nota: ', '');
    nota2 = prompt('Ingresa la 2da. nota: ', '');
    nota3 = prompt('Ingresa la 3ra. nota: ', '');

    //Convertimos los 3 strings en enteros

    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    var pro;

    pro = (nota1 + nota2 + nota3) / 3;

    if(pro >= 7){
        document.write('Aprobado con ' + parseInt(pro));
    }
    else{
        if(pro >= 4){
            document.write('Regular con ' + parseInt(pro));
        }
        else{
            document.write('Reprobado' + parseInt(pro));
        }
    }
}

function ejemploOcho(){
    var valor;

    valor = prompt('Ingresa un valor comprendido entre 1 y 5: ', '');
    valor = parseInt(valor);

    switch(valor){
        case 1:
            document.write('Ingresaste un uno');
            break;
        case 2:
            document.write('Ingresaste un dos');
            break;
        case 3:
            document.write('Ingresaste un tres');
            break;
        case 4:
            document.write('Ingresaste un cuatro');
            break;
        case 5:
            document.write('Ingresaste un cinco');
            break;
        default:
            document.write('Debes ingresar un valor comprendido entre 1 y 5');
    }
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