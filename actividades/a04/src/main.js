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

function ejemploNueve(){
    var col;
    
    col = prompt('Ingresa el color con el que quieras pintar el fondo de la ventana (rojo, verde o azul): ', '');

    switch(col){
        case 'rojo':
            document.bgColor = '#ff0000';
            break;
        case 'verde':
            document.bgColor = '#00ff00';
            break;
        case 'azul':
            document.bgColor = '#0000ff';
            break;
        default:
            document.bgColor = '#FFFFFF';
    }
}

function ejemploDiez(){
    var x;
    x = 1;
    
    while(x <= 100){
        document.write(x);
        document.write('<br />');
        x = x + 1;
    }
}

function ejemploOnce(){
    var x = 1;
    var suma = 0;
    var valor;

    while(x <= 5){
        valor = prompt('Ingresa el valor: ', '');
        valor = parseInt(valor);
        suma = suma + valor;
        x = x + 1;
    }
    document.write('La suma de los valores ingresados es: ' + suma + '<br/>');
}

function ejemploDoce(){
    var valor;
    do{
        valor = prompt('Ingresa un valor entre 0 y 999: ', '');
        valor = parseInt(valor);

        document.write('El valor ' + valor + ' tiene: ');

        if(valor < 10){
            document.write('1 dígito.');
        }
        else{
            if(valor < 100){
                document.write('2 dígitos.');
            }
            else{
                document.write('3 dígitos.');
            }
        }

        document.write('<br/>');
    }while(valor != 0);
}

function ejemploTrece(){
    var f;
    
    for(f = 1; f <= 10; f++){
        document.write(f + " ");
    }
}

function ejemploCatorce(){
    document.write("Cuidado <br/>");
    document.write("Ingresa tu documento correctamente <br/>");
    document.write("Cuidado <br/>");
    document.write("Ingresa tu documento correctamente <br/>");
    document.write("Cuidado <br/>");
    document.write("Ingresa tu documento correctamente <br/>");
}

function mostrarMensaje(){
    document.write("Cuidado <br/>");
    document.write("Ingresa tu documento correctamente <br/>");
}

function ejemploQuince(){
    mostrarMensaje();
    mostrarMensaje();
    mostrarMensaje();
}

function mostrarRango(x1, x2){
    var inicio;

    for(inicio = x1; inicio <= x2; inicio++){
        document.write(inicio + ' ');
    }
}

function ejemploDieciseis(){
    var valor1, valor2;

    valor1 = prompt('Ingresa el valor inferior: ', '');
    valor1 = parseInt(valor1);
    valor2 = prompt('Ingresa el valor superior: ', '');
    valor2 = parseInt(valor2);

    mostrarRango(valor1, valor2);
}

function convertirCastellano(x){
    if(x == 1)
        return "uno";
    else
        if(x == 2)
            return "dos";
        else
            if(x == 3)
                return "tres";
            else
                if(x == 4)
                    return "cuatro";
                else
                    if(x == 5)
                        return "cinco";
                    else
                        return "valor incorrecto";
}

function ejemploDiecisiete(){
    var valor = prompt('Ingresa un valor entre 1 y 5: ', '');
    valor = parseInt(valor);
    var r = convertirCastellano(valor);
    document.write(r);
}

function convertirCastellanoDos(x){
    switch(x){
        case 1: return "uno";
        case 2: return "dos";
        case 3: return "tres";
        case 4: return "cuatro";
        case 5: return "cinco";
        default: return "valor incorrecto";
    }
}

function ejemploDieciocho(){
    var valor = prompt('Ingresa un valor entre 1 y 5: ', '');
    valor = parseInt(valor);
    var r = convertirCastellanoDos(valor);
    document.write(r);
}

/*
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
*/